<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\productCreateRequest;
use App\Http\Requests\Products\productUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }
     /***
     * Showing data using jquery dataTables
     *
     * @return \Illuminate\Http\Response
     */

    public function dataProducts()
    {
        $product =  Product::select(['id', 'name', 'description']);

        return Datatables::of($product)
            ->addColumn('action', function ($product) {
                return '<a href="product/'.$product->id.'/edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> </a>
                <a href="product/'.$product->id.'/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>';
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
        $categories = Category::all();
        return view('admin.product.create')->with([
            'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productCreateRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        $product->save();
        return redirect()->back()->with('message','Product Created Successfully!');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.product.edit')->with([
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(productUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->fill($request->all());
        $product->update($request->only(['name', 'description','body']));
        if($request->hasFile('image')){
            $remove =str_replace("/storage/", "", $product->image);
            Storage::delete('public/'.$remove);
            $product->image = $request->file('image');
        }
        if ($request->hasFile('pdf')) {
            $remove =str_replace("/storage/", "", $product->pdf);
            Storage::delete('public/'.$remove);
            $product->pdf = $request->file('pdf');
        }
        if ($request->hasFile('video')) {
            $remove =str_replace("/storage/", "", $product->video);
            Storage::delete('public/'.$remove);
            $product->video = $request->file('video');
        }
        $product->save();
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');
    }
}
