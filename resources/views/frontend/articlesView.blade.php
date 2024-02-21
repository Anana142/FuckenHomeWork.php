@extends('frontend.base')


@section('articles')


    @foreach($articles as $article)
        <article class="entry">

            <div class="entry-img">
                <img src="{{ $article->image }}" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
                <a href="/post/{{ $article->id }}">{{ $article->title }}</a>
            </h2>

            <div class="entry-meta">
                <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">Author</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">Date</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">Many comments</a></li>
                </ul>
            </div>

            <div class="entry-content">
                <p>
                    {{ $article->description }}
                </p>
                <div class="read-more">
                    <a href="post/{{ $article->id }}">Read More</a>
                </div>
            </div>

        </article>
    @endforeach
    {{$articles->links('vendor.pagination.bootstrap-5')}}
@endsection


