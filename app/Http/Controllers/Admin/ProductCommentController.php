<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\productCommentsRequest;
use App\Models\ProductComments;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;



class ProductCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.Product.comment.index');
    }
     /***
     * Showing data using jquery dataTables
     *
     * @return \Illuminate\Http\Response
     */

    public function dataComments()
    {
        $comments =  ProductComments::select(['id', 'user_id','product_id','body','confirmation']);

        return Datatables::of($comments)
            ->addColumn('action', function ($comment) {
                return '<a href="productComment/'.$comment->id.'/edit" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> </a>';
            })
            ->make(true);
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
        $comment = ProductComments::findOrFail($id);
        return view('admin.product.comment.edit')->with([
           'comment'=>$comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(productCommentsRequest $request, $id)
    {
        $comment = ProductComments::findOrFail($id);
        $comment->fill($request->all());
        $comment->save();
        return redirect()->back()->with([
            'message'=>'productComment updated successfully!'
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
        //
    }
}
