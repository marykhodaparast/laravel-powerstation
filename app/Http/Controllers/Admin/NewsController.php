<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\News\newsCreateRequest;
use App\Http\Requests\News\newsUpdateRequest;
use App\News;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index');
    }
    /***
     * Showing data using jquery dataTables
     *
     * @return \Illuminate\Http\Response
     */

    public function dataNews()
    {
        $news =  News::select(['id', 'title', 'description']);

        return Datatables::of($news)
            ->addColumn('action', function ($news) {
                return '<a href="news/'.$news->id.'/edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> </a>
                <a href="news/'.$news->id.'/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>';
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
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(newsCreateRequest $request)
    {
        dd($request->all());
        $news = new News();
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->body = $request->input('body');
        $news->published_at = $request->input('published_at');
        $news->published = $request->get('published',false);
        $news->image = $request->file('image');
        $news->video = $request->file('video');
        $news->save();
        return redirect()->back()->with('message','News Created Successfully!');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.edit')->with([
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(newsUpdateRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        $news->body = $request->input('body');
        $news->update($request->only(['title', 'description','body']));
        if($request->hasFile('image')){
            $remove =str_replace("/storage/", "", $news->image);
            Storage::delete('public/'.$remove);
            $news->image = $request->file('image');
        }
        if ($request->hasFile('video')) {
            $remove =str_replace("/storage/", "", $news->video);
            Storage::delete('public/'.$remove);
            $news->video = $request->file('video');
        }
        $news->save();
        return redirect(route('admin.news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->back()->with('message','News Deleted Successfully');
    }
}
