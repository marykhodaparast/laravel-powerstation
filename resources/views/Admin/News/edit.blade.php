@extends('admin.layouts.master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('/css/createNews.css')}}">
@endsection
@section('content')

<form action="{{route('news.update',['id'=>$news->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    {{--Begin:Title--}}
    <div class="form-group">
        <label for="title" class="ml-2">Title:</label>
        <input type="text" class="form-control ml-2 Text {{$errors->has('title')?'is-invalid':''}}"
            value='{{$news->title}}' id="title" name="title" placeholder="Enter Title">
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
                {{$news->description}}
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
     {{$errors->has('body')?'is-invalid':''}}" id="textarea">
        {{ $news->body }}
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
                    <input type="file" class="custom-file-input form-control
                       {{$errors->has('image')?'is-invalid':''}}" id="image" name="image" value={{$news->image}}>
                    @if($news->image)
                    <label class="custom-file-label" for="image">Click to change</label>
                    @else
                    <label class="custom-file-label" for="image">Choose image</label>
                    @endif
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
                    <input type="file" class="custom-file-input
                        {{$errors->has('video')?'is-invalid':''}}" id="video" name="video" value={{$news->video}}>
                    @if($news->video)
                    <label class="custom-file-label" for="video">Click to change</label>
                    @else
                    <label class="custom-file-label" for="video">Choose video</label>
                    @endif
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
                    value={{ $news->published_at }} id="published_at" name="published_at">
                @if($errors->has('published_at'))
                <div class="invalid-feedback ml-2">{{$errors->first('published_at')}}</div>
                @endif
            </div>
            {{--End:datapicker('published_at')--}}
            {{-- Start:published --}}
            <div class="form-group label-input ml-3">
                <label class="checkbox-inline" for="published"><input type="checkbox" value="{{ $news->published == 1?1:0 }}" name="published" {{ $news->published == 1?'checked':'' }}> published</label>
            </div>
            {{-- End:published --}}
    </div>
    <div class="input-group">
        <button type="submit" class="btn btn-dark ml-2">update</button>
        {{-- <button type="submit" class="btn btn-danger ml-3">cancel</button> --}}
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
