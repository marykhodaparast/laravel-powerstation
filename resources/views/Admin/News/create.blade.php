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
<form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    {{--Begin:Title--}}
    <div class="form-group">
        <label for="title" class="ml-2">Title:</label>
        <input type="text" class="form-control ml-2 Text {{$errors->has('title')?'is-invalid':''}}"
            value='{{old('title')}}' id="title" name="title" placeholder="Enter Title">
        @if($errors->has('title'))
        <div class="invalid-feedback ml-2">{{$errors->first('title')}}</div>
        @endif
    </div>
    {{--End:Title--}}

    {{--Begin:Description--}}
    <div class="form-group">
        <label for="description" class="ml-2">Description:</label>
        <textarea rows="5" cols="6" name="description" class="form-control Text ml-2
             {{$errors->has('description')?'is-invalid':''}}">
                {{old('description')}}
            </textarea>
        @if($errors->has('description'))
        <div class="invalid-feedback ml-2">{{$errors->first('description')}}</div>
        @endif
    </div>
    {{--End:Description--}}

    {{--Begin:body--}}
    <div class="form-group" id="body_form_group">
        <label for="body" class="ml-2">Body:</label>
        <textarea rows="3" cols="3" name="body" class="form-control Text ml-2
         {{$errors->has('body')?'is-invalid':''}}" id="textarea_body">
            {{old('body')}}
        </textarea>
        @if($errors->has('body'))
        <div class="invalid-feedback ml-2">{{$errors->first('body')}}</div>
        @endif
    </div>
    {{--End:body--}}

    <div class="form-row">
        {{--Begin:Image--}}
        <div class="form-group col-md-4">
            <label for="image" class="ml-2">Image:</label>
            <div class="input-group ml-2 newsFile">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control {{$errors->has('image')?'is-invalid':''}}"
                        id="image" name="image">
                    <label class="custom-file-label" for="image">Choose Image</label>
                </div>
            </div>
            @if($errors->has('image'))
            <div class="invalid-feedback ml-2">{{$errors->first('image')}}</div>
            @endif

        </div>


        {{--End:Image--}}

        {{--Begin:Video--}}
        <div class="form-group col-md-4">
            <label for="video" class="ml-2">Video:</label>
            <div class="input-group ml-2 newsFile">
                <div class="custom-file">
                    <input type="file" class="custom-file-input {{$errors->has('video')?'is-invalid':''}}" id="video"
                        name="video">
                    <label class="custom-file-label" for="video">Choose Video</label>
                </div>
            </div>
            @if($errors->has('video'))
            <div class="invalid-feedback ml-2">{{$errors->first('video')}}</div>
            @endif
        </div>
        {{--End:Video--}}
        {{--Begin:datepicker('published_at')--}}
        <div class="form-group col-md-4">
            <label for="published_at" class="ml-2">Published_at:</label>
            <input type="text" class="form-control ml-2 Text {{$errors->has('published_at')?'is-invalid':''}}"
                value='{{old('published_at')}}' id="published_at" name="published_at">
            @if($errors->has('published_at'))
            <div class="invalid-feedback ml-2">{{$errors->first('published_at')}}</div>
            @endif
        </div>
        {{--End:datapicker('published_at')--}}
        {{-- Start:published --}}
        <div class="form-group label-input ml-3">
            <label class="checkbox-inline" for="published"><input type="checkbox" value="1" name="published"> published</label>
        </div>
        {{-- End:published --}}
    </div>
    <div class="input-group">
        <button type="submit" class="btn btn-dark ml-2">save</button>
    </div>

</form>
@endsection
@push('scripts')
{{--  <script src="{{ asset('/js/jquery.js') }}"></script>
<script src="{{ asset('/js/persian.date.js') }}"></script>
<script src="{{ asset('js/persian.datepicker.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $("#published_at").pDatepicker();
    });
</script>  --}}
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#published_at').datepicker({
        dateFormat: "yy-mm-dd"
      });
    });
</script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
<script>
    $('#textarea_body').ckeditor();
        $('#body_form_group').addClass('ckEditor');
</script>
@endpush
