@extends('admin.layouts.master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('/css/createNews.css')}}">
<link rel="stylesheet" href="{{ asset('/css/persian.datepicker.css') }}" />
@endsection
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-block ml-2 Text">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ Session::get('message') }}</strong>
</div>
@endif
<form action="{{route('category.store')}}" method="post">
    @csrf
    {{--Begin:Name--}}
    <div class="form-group">
        <label for="name" class="ml-2">Name:</label>
        <input type="text" class="form-control ml-2 Text {{$errors->has('name')?'is-invalid':''}}"
            value='{{old('name')}}' id="name" name="name" placeholder="Enter name">
        @if($errors->has('name'))
        <div class="invalid-feedback ml-2">{{$errors->first('name')}}</div>
        @endif
    </div>
    {{--End:Name--}}


    <div class="input-group">
        <button type="submit" class="btn btn-dark ml-2">save</button>
    </div>

</form>
@endsection
