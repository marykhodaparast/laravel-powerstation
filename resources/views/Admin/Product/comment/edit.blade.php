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
<form action="{{route('product.comment.update',['id'=>$comment->id])}}" method="post">
    @csrf
    {{--Begin:body--}}
    <div class="form-group" id="body_form_group">
        <label for="body" class="ml-2">Body:</label>
        <textarea rows="3" cols="3" name="body" class="form-control Text ml-2
         {{$errors->has('body')?'is-invalid':''}}" id="textarea" readonly>
            {{ $comment->body }}
        </textarea>
        @if($errors->has('body'))
        <div class="invalid-feedback ml-2">{{$errors->first('body')}}</div>
        @endif
    </div>
    {{--End:body--}}
    {{-- Start:comfirmation --}}
    <div class="form-group label-input ml-3">
        <label class="checkbox-inline" for="published"><input type="checkbox" value="1" name="confirmation"> confirm</label>
    </div>
    {{-- End:confirmation --}}

    <div class="input-group">
        <button type="submit" class="btn btn-dark ml-2">save</button>
    </div>

</form>
@endsection
@push('scripts')
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
<script>
    $('#textarea').ckeditor();
        $('#body_form_group').addClass('ckEditor');
</script>
@endpush
