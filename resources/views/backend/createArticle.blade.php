
@extends('backend.adminBase')


@section('content')
<form style="margin: 30px" method="post" action="/admin/save/post" >
<input type="hidden" name="id" value="{{ $post->id }}" style="visibility: collapse"/>
<h3 style="font-size: 24px; font-weight: bold" >Заголовок</h3>
    <input type="text" name="title" value="{{ $post->title }}">
@csrf

<h3 style="margin-top: 10px; font-size: 24px; font-weight: bold">Статья</h3>

<textarea type="text" id="editContent" class="form-control" style="width: 700px; height: 500px; font-size: 16px" name="content">
    {{ $post->content }}
</textarea>

<input style="margin: 10px 0px; font-size: 18px" type="submit" class="btn btn-outline-primary" value="Сохранить">
<a class="btn btn-primary" style="margin: 0px 30px; font-size: 18px" href="//fuckenhomework.test/login">Отменить</a>
</form>


@endsection
