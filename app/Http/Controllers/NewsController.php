<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Support\Carbon;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $news = News::paginate(8);
        return view('FrontEnd.blog.all')->with([
            'news'=>$news
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
        $news = News::where('slug',$slug)->firstOrFail();
        $publish = Carbon::parse($news->published_at)->format('d M Y');
        return view('FrontEnd.blog.show')->with([
          'news' => $news,
          'publish'=>$publish
        ]);
    }

}
