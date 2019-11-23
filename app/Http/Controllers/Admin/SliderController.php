<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sliders\SliderCreateRequest;
use App\Http\Requests\Sliders\SliderUpdateRequest;
use App\Slider;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slider.index');
    }

    /***
     * Showing data using jquery dataTables
     *
     * @return \Illuminate\Http\Response
     */

    public function dataSliders()
    {
        $sliders =  Slider::select(['id', 'title', 'body','link']);

        return Datatables::of($sliders)
            ->addColumn('action', function ($sliders) {
                return '<a href="slider/'.$sliders->id.'/edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> </a>
                <a href="slider/'.$sliders->id.'/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderCreateRequest $request)
    {
        //dd($request->all());
        $sliders = new Slider();
        $sliders->title = $request->input('title');
        $sliders->body = $request->input('body');
        $sliders->image = $request->file('image');
        $sliders->link = $request->input('link');
        $sliders->save();
        return redirect()->back()->with('message','Slider Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view('admin.slider.edit')->with([
            'slider' => $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderUpdateRequest $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->title = $request->input('title');
        $slider->body = $request->input('body');
        $slider->link = $request->input('link');
        $slider->update($request->only(['title', 'body','link']));
        if($request->hasFile('image')){
            $remove =str_replace("/storage/", "", $slider->image);
            Storage::delete('public/'.$remove);
            $slider->image = $request->file('image');
        }

        $slider->save();
        return redirect(route('sliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->back()->with('message','Slider Deleted Successfully');
    }
}
