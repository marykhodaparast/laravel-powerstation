@extends('admin.layouts.master')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('/css/createNews.css')}}">
@endsection
@section('content')

<form action="{{route('products.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    {{--Begin:Title--}}
    <div class="form-group">
        <label for="name" class="ml-2">Name:</label>
        <input type="text" class="form-control ml-2 Text {{$errors->has('name')?'is-invalid':''}}"
            value='{{$product->name}}' id="title" name="name" placeholder="Enter name">
        @if($errors->has('name'))
        <div class="invalid-feedback ml-2">{{$errors->first('name')}}</div>
        @endif
    </div>
    {{--End:Title--}}

    {{--Begin:Description--}}
    <div class="form-group">
        <label for="description" class="ml-2">Description:</label>
        <textarea rows="5" cols="6" name="description" class="form-control Text ml-2
             {{$errors->has('description')?'is-invalid':''}}">
                {{$product->description}}
            </textarea>
        @if($errors->has('description'))
        <div class="invalid-feedback ml-2">{{$errors->first('description')}}</div>
        @endif
    </div>
    {{--End:Description--}}
    {{-- Start:category_id --}}
    <div class="form-group">
        <label for="category_id" class="ml-2">Category:</label>
        <select class="form-control ml-2 Text" id="cat" name="category_id">
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id==$product->category_id?'selected':'' }}>{{ $category->name }}</option>
            @endforeach

        </select>
    </div>
    {{-- End:category_id --}}
    {{--Begin:body--}}
    <div class="form-group" id="body_form_group">
        <label for="body" class="ml-2">Body:</label>
        <textarea rows="3" cols="3" name="body" class="form-control Text ml-2
         {{$errors->has('body')?'is-invalid':''}}" id="textarea">
            {{ $product->body }}
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
                    @if($product->image)
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

        {{--Begin:pdf--}}
        <div class="form-group col-md-4">
            <label for="pdf" class="ml-2">Pdf:</label>
            <div class="input-group ml-2 newsFile">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control {{$errors->has('pdf')?'is-invalid':''}}"
                        id="pdf" name="pdf">
                    @if($product->pdf)
                    <label class="custom-file-label" for="image">Click to change</label>
                    @else
                    <label class="custom-file-label" for="image">Choose pdf</label>
                    @endif
                </div>
            </div>
            @if($errors->has('pdf'))
            <div class="invalid-feedback ml-2">{{$errors->first('pdf')}}</div>
            @endif

        </div>
        {{--End:pdf--}}
        {{--Begin:video--}}
        <div class="form-group col-md-4">
            <label for="video" class="ml-2">Video:</label>
            <div class="input-group ml-2 newsFile">
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control {{$errors->has('video')?'is-invalid':''}}"
                        id="video" name="video">
                    @if($product->video)
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
        {{--End:video--}}
    </div>
    <div class="input-group">
        <button type="submit" class="btn btn-dark ml-2">update</button>
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
