@extends('admin.layouts.master')
@section('styles')
   <link rel="stylesheet" type="text/css" href="{{asset('/css/createNews.css')}}" >
@endsection
@section('content')
@if(Session::has('message'))
        <div class="alert alert-success alert-block ml-2 Text">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
<form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    {{--Begin:Title--}}
    <div class="form-group">
        <label for="title" class="ml-2 ">Title:</label>
        <input type="text" class="form-control ml-2 Text {{$errors->has('title')?'is-invalid':''}}"
               value='{{old('title')}}' id="title" name="title" placeholder="Enter Title">
        @if($errors->has('title'))
            <div class="invalid-feedback ml-2">{{$errors->first('title')}}</div>
        @endif
    </div>
    {{--End:Title--}}

    {{--Begin:body--}}
    <div class="form-group">
        <label for="body" class="ml-2">Body:</label>
        <textarea rows="5" cols="6" name="body" class="form-control Text ml-2
         {{$errors->has('body')?'is-invalid':''}}">
            {{old('body')}}
        </textarea>
        @if($errors->has('body'))
            <div class="invalid-feedback ml-2">{{$errors->first('body')}}</div>
        @endif
    </div>
    {{--End:body--}}

    <div class="form-row">
    {{--Begin:Image--}}
       <div class="form-group col-md-6">
           <label for="image" class="ml-2">Image:</label>
           <div class="input-group ml-2 newsFile">
               <div class="custom-file">
                   <input type="file" class="custom-file-input form-control {{$errors->has('image')?'is-invalid':''}}" id="image" name="image">
                   <label class="custom-file-label" for="image">Choose Image</label>
               </div>
           </div>
           @if($errors->has('image'))
               <div class="invalid-feedback ml-2">{{$errors->first('image')}}</div>
           @endif

       </div>


    {{--End:Image--}}

    {{--Begin:Link--}}
    <div class="form-group col-md-6">
        <label for="link" class="ml-2">Link:</label>
        <input type="text" class="form-control ml-2 Text {{$errors->has('link')?'is-invalid':''}}"
               value='{{old('link')}}' id="link" name="link" placeholder="Enter Link">
        @if($errors->has('link'))
            <div class="invalid-feedback ml-2">{{$errors->first('link')}}</div>
        @endif
    </div>
    {{--End:Link--}}
    </div>

    <div class="input-group">
        <button type="submit" class="btn btn-dark ml-2">save</button>
    </div>

</form>
@endsection
