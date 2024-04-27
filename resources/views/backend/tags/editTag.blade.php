
@extends('backend.adminBase')


@section('content')
    <form style="margin: 30px" method="post" action="/admin/tag/update/{{$tag->id }}" >
    <input type="hidden" name="id" value="{{ $tag->id }}" style="visibility: collapse"/>
    <h3 style="font-size: 24px; font-weight: bold" >Заголовок</h3>
    <input type="text" name="title" value="{{ $tag->name }}">
    @csrf

    <input style="margin: 10px 0px; font-size: 18px" type="submit" class="btn btn-outline-primary" value="Сохранить">
    <a class="btn btn-primary" style="margin: 0px 30px; font-size: 18px" href="//fuckenhomework.test/admin/tag">Отменить</a>
    </form>
@endsection
