<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\productCommentsRequest;
use App\Http\Requests\Products\productReplyRequest;
use App\Models\Product;
use App\Models\ProductComments;
use App\Models\productReplyComment;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(8);
        return view('FrontEnd.product.all')->with([
            'products' => $products
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $products = Product::all();
        $product_comments = ProductComments::where('product_id', $product->id)->get();
        $commentCount = $product_comments->where('confirmation', 1)->count();
        $like_counter = 0;
        return view('FrontEnd.product.show')->with([
            'product' => $product,
            'products' => $products,
            'comments' => $product_comments,
            'like_counter' => $like_counter,
            'commentCount' => $commentCount
        ]);
    }

    public function store(productCommentsRequest $request, $id)
    {
        $comment = new ProductComments();
        if (auth()->check()) {
            $comment->user_id = auth()->user()->id;
        } else {
            $comment->user_id = 0;
        }
        $comment->product_id = $id;
        //dd($comment->replies->id);
        //$x = ProductComments::where('id',5)->get();
        $comment->reply_id = 0;
        $comment->fill($request->all());
        if ($comment->user_id != 0) {
            $comment->save();
        }
    }

    // public function reply_store(productReplyRequest $request, $id)
    // {
    //     $reply = new productReplyComment();

    //     $reply->product_id = $id;
    //     $reply->comment_id = $reply->comment->id;
    //     dd($reply->comment(),$request->all(),'product_id is:'.$reply->product_id,'comment_id is'.$reply->comment_id);
    //     $reply->fill($request->all());
    //     // if(auth()->check()){
    //     //     $reply->save();
    //     // }
    // }
}
