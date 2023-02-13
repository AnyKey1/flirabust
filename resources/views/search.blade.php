@extends("main")

@section('content')


    <div class="container">
        <form method="get" action="{{ route("search") }}">
            <div class="row">
                <div class="form-group col-md-5">
                    <input class="form-control shadow-none" type="text" placeholder="Название" name="title">
                </div>
                <div class="form-group col-md-5">
                    <input class="form-control shadow-none" type="text" placeholder="Автор" name="author">
                </div>
                <div class="form-group col-md-2">
                    <button class="btn btn-primary" type="submit">Искать</button>
                </div>
            </div>
        </form>
        @if($result)
        <div class="row justify-content-center">
            <div class="col-lg-12 mb-4">
                <h1 class="h2 mb-4">Search results for
                    <mark>Use+apples+to+give+your+bakes+caramel</mark>
                </h1>
            </div>
            <div class="col-lg-10">
                @foreach($result as $post)
                <article class="card mb-4">
                    <div class="row card-body">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="post-slider slider-sm slick-initialized slick-slider"><button type="button" class="prevArrow slick-arrow" style=""><i class="ti-angle-left"></i></button>
                                <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 1350px; transform: translate3d(-540px, 0px, 0px); transition: transform 500ms ease 0s;">
                                        <img src="images/post/post-1.jpg" class="card-img slick-slide slick-cloned" alt="post-thumb" style="height: 200px; object-fit: cover; width: 270px;" data-slick-index="-1" aria-hidden="true" tabindex="-1">
                                        <img src="images/post/post-10.jpg" class="card-img slick-slide" alt="post-thumb" style="height: 200px; object-fit: cover; width: 270px;" data-slick-index="0" aria-hidden="true" tabindex="0">
                                        <img src="images/post/post-1.jpg" class="card-img slick-slide slick-current slick-active" alt="post-thumb" style="height: 200px; object-fit: cover; width: 270px;" data-slick-index="1" aria-hidden="false" tabindex="-1">
                                        <img src="images/post/post-10.jpg" class="card-img slick-slide slick-cloned" alt="post-thumb" style="height: 200px; object-fit: cover; width: 270px;" data-slick-index="2" aria-hidden="true" tabindex="-1">
                                        <img src="images/post/post-1.jpg" class="card-img slick-slide slick-cloned" alt="post-thumb" style="height: 200px; object-fit: cover; width: 270px;" data-slick-index="3" aria-hidden="true" tabindex="-1">
                                    </div>
                                </div>

                                <button type="button" class="nextArrow slick-arrow" style=""><i class="ti-angle-right"></i></button></div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="h4 mb-3"><a class="post-title" href="{{ route("book", $post->id) }}">{{$post->title}}</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="/images/john-doe.jpg" alt="{{$post->author_name}}">
                                        <span>{{$post->author_name}}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-timer"></i>3 Min To Read
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>15 jan, 2020
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        @foreach($post->tags as $tag)
                                        <li class="list-inline-item"><a href="/tags/{{$tag}}">{{$tag}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <p>Heading example Here is example of hedings. You can use this heading by following markdownify rules.</p>
                            <a href="{{ route("book", $post->id) }}" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif
    </div>
@endsection
