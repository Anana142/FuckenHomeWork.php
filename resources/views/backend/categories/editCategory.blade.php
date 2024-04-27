
@extends('backend.adminBase')


@section('content')
    <form style="margin: 30px" method="post" action="/admin/category/update/{{$category->id }}" >
    <input type="hidden" name="id" value="{{ $category->id }}" style="visibility: collapse"/>
    <h3 style="font-size: 24px; font-weight: bold" >Заголовок</h3>
    <input type="text" name="title" value="{{ $category->title }}">
    @csrf

    <input style="margin: 10px 0px; font-size: 18px" type="submit" class="btn btn-outline-primary" value="Сохранить">
    <a class="btn btn-primary" style="margin: 0px 30px; font-size: 18px" href="//fuckenhomework.test/admin/category">Отменить</a>
    </form>


@endsection
