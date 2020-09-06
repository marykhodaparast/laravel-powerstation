<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
/** Start:admin part */
Route::namespace('Admin')->prefix('admin')->middleware('admin')->name("admin.")->group(function(){

  Route::get('/','HomeController@index')->name('index');

    /**
     * News part
     */
    Route::prefix('news')->group(function (){
       Route::get('/create','NewsController@create')->name('news.create');
       Route::post('/store','NewsController@store')->name('news.store');
       Route::get('/{id}/edit','NewsController@edit')->name('news.edit');
       Route::post('/{id}/update','NewsController@update')->name('news.update');
       Route::get('/{id}/delete','NewsController@destroy')->name('news.delete');
       Route::get('/','NewsController@index')->name('news.index');
       Route::get('/api','NewsController@dataNews')->name('news.data');
    });
    /**
     * Sliders part
     * */
    Route::prefix('slider')->group(function(){
        Route::get('/create','SliderController@create')->name('sliders.create');
        Route::post('/store','SliderController@store')->name('sliders.store');
        Route::get('/{id}/edit','SliderController@edit')->name('sliders.edit');
        Route::post('/{id}/update','SliderController@update')->name('sliders.update');
        Route::get('/{id}/delete','SliderController@destroy')->name('sliders.delete');
        Route::get('/','SliderController@index')->name('sliders.index');
        Route::get('/api','SliderController@dataSliders')->name('sliders.data');
    });
    /***
     * Product part
     */
    Route::prefix('product')->group(function(){
        Route::get('/create','ProductController@create')->name('products.create');
        Route::post('/store','ProductController@store')->name('products.store');
        Route::get('/{id}/edit','ProductController@edit')->name('products.edit');
        Route::post('/{id}/update','ProductController@update')->name('products.update');
        Route::get('/{id}/delete','ProductController@destroy')->name('products.delete');
        Route::get('/','ProductController@index')->name('products.index');
        Route::get('/api','ProductController@dataProducts')->name('products.data');
    });
    /**
     * ProductCategory part
     */
    Route::prefix('productCategory')->group(function(){
        Route::get('/create','ProductCategoryController@create')->name('category.create');
        Route::post('/store','ProductCategoryController@store')->name('category.store');
        Route::get('/{id}/edit','ProductCategoryController@edit')->name('category.edit');
        Route::post('/{id}/update','ProductCategoryController@update')->name('category.update');
        Route::get('/{id}/delete','ProductCategoryController@destroy')->name('category.delete');
        Route::get('/','ProductCategoryController@index')->name('category.index');
        Route::get('/api','ProductCategoryController@dataCategories')->name('category.data');
    });
    /**
     * ProductComments part
     */
    Route::prefix('productComment')->name('product.')->group(function(){
        Route::get('/{id}/edit','ProductCommentController@edit')->name('comment.edit');
        Route::post('/{id}/update','ProductCommentController@update')->name('comment.update');
        Route::get('/','ProductCommentController@index')->name('comment.index');
        Route::get('/api','ProductCommentController@dataComments')->name('comment.data');
    });

});
/** End:admin part */

/** Start:FrontEnd part */
Auth::routes();

Route::get('/', 'HomeController@index')->name('welcome');
/** Start:redirect login and register to / */
Route::match('get','/login',function(){
   return redirect('/');
});
Route::match('get','/register',function(){
  return redirect('/');
});
/** End:redirect login and register to / */
/** End:FrontEnd part */

Route::get('/test',function(){
   return view('FrontEnd.product.test');
});
// Route::get('/test2',function(){
//     return view('FrontEnd.product.test2');
//  });
Route::get('products/all','ProductsController@index')->name('products.all');
Route::get('products/{slug}','ProductsController@show')->name('products.show');
Route::post('products/store/{id}/{comment_id}','ProductsController@store')->name('products.store');

Route::get('news/all','NewsController@index')->name('news.all');
Route::get('news/{slug}','NewsController@show')->name('news.show');
Route::get('not-found','ErrorController@not_found')->name('404');
Route::get('about-us','HomeController@about_us')->name('about_us');
