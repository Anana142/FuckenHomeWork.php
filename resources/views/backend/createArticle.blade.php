
@extends('backend.adminBase')


@section('content')
<form style="margin: 30px" method="post" action="/admin/save/post" >
<input type="hidden" name="id" value="{{ $post->id }}" style="visibility: collapse"/>
<h3 style="font-size: 24px; font-weight: bold" >Заголовок</h3>
    <input type="text" name="title" value="{{ $post->title }}">
@csrf

    <div class="input-group">
   <span class="input-group-btn">
     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> Choose
     </a>
   </span>
        <input id="thumbnail" class="form-control" type="text" value="{{$post->image}}" name="image">
    </div>
    <div id="holder" style="margin-top: 15px;">
        <img style="height: 5rem;" src="{{$post->image}}">
    </div>

<h3 style="margin-top: 10px; font-size: 24px; font-weight: bold">Статья</h3>
    <textarea type="text" id="editContent" class="form-control" style="width: 700px; height: 500px; font-size: 16px" name="content">
    {{ $post->content }}
    </textarea>

<h4>Категория</h4>
    <select name="selectCategory" class="form-select">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>

<h4>Теги</h4>
    <select class="js-example-basic-multiple" name="tags[]" multiple="multiple" style="width: 925px;">
        @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
    </select><br/>

<input style="margin: 10px 0px; font-size: 18px" type="submit" class="btn btn-outline-primary" value="Сохранить">
<a class="btn btn-primary" style="margin: 0px 30px; font-size: 18px" href="//fuckenhomework.test/login">Отменить</a>



</form>


@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#editContent').summernote();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>$('#lfm').filemanager('image');</script>
@endsection
