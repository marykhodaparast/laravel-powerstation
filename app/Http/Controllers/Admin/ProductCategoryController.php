<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\Category as AppCategory;
use App\Models\Category;
use Yajra\DataTables\DataTables;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Product.category.index');
    }
    /***
     * Showing data using jquery dataTables
     *
     * @return \Illuminate\Http\Response
     */

    public function dataCategories()
    {
        $categories =  Category::select(['id', 'name']);

        return Datatables::of($categories)
            ->addColumn('action', function ($category) {
                return '<a href="productCategory/'.$category->id.'/edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> </a>
                <a href="productCategory/'.$category->id.'/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </a>';
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
        return view('admin.product.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppCategory $request)
    {
        $category = new Category();
        $category->fill($request->all());
        $category->save();
        return redirect()->back()->with([
          'message'=>'productCategory created successfully!'
        ]);
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
        $category = Category::findOrFail($id);
        return view('admin.product.category.edit')->with([
            'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppCategory $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->fill($request->all());
        $category->save();
        return redirect()->back()->with([
          'message'=>'productCategory edited successfully!'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_category = Category::findOrFail($id);
        $product_category->delete();
        return redirect()->back()->with('message','productCategory Deleted Successfully');
    }
}
