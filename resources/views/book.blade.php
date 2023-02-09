@extends("main")

@section('book')
    <div class="row justify-content-center">
        <div class=" col-lg-9   mb-5 mb-lg-0">
            <article>
                <div class="post-slider mb-4 slick-initialized slick-slider">
                    <div class="slick-list draggable">
                        <div class="slick-track" style="opacity: 1; width: 825px; transform: translate3d(0px, 0px, 0px);"><img
                                src="/images/post/post-2.jpg" class="card-img slick-slide slick-current slick-active" alt="post-thumb"
                                data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 825px;"></div>
                    </div>
                </div>

                <h1 class="h2">{{ $book->title }} </h1>
                <ul class="card-meta my-3 list-inline">
                    <li class="list-inline-item">
                        <a href="author-single.html" class="card-meta-author">
                            <img src="/images/john-doe.jpg">
                            <span>{{ $book->author_name }}</span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <i class="ti-timer"></i>2 Min To Read
                    </li>
                    <li class="list-inline-item">
                        <i class="ti-calendar"></i>14 jan, 2020
                    </li>

                    <li class="list-inline-item">
                        <ul class="card-meta-tag list-inline">
                            @foreach($book->tags as $tag)
                            <li class="list-inline-item"><a href="/tags/{{$tag}}">{{$tag}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                <div class="content"><p>It’s no secret that the digital industry is booming. From exciting startups to global brands,
                        companies are reaching out to digital agencies, responding to the new possibilities available. However, the industry
                        is fast becoming overcrowded, heaving with agencies offering similar services — on the surface, at least. Producing
                        creative, fresh projects is the key to standing out. Unique side projects are the best place to innovate, but
                        balancing commercially and creatively lucrative work is tricky. So, this article looks at</p>
                    <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, companies
                        are reaching out to digital agencies, responding to the new possibilities available. However, the industryis fast
                        becoming overcrowded, heaving with agencies offering similar services — on the surface, at least.Producing creative,
                        fresh projects is the key to standing out. Unique side projects are the best place toinnovate, but balancing
                        commercially and creatively lucrative work is tricky. So, this article looks at</p>
                    <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, companies
                        are reaching out to digital agencies, responding to the new possibilities available. However, the industryis fast
                        becoming overcrowded, heaving with agencies offering similar services — on the surface, at least.
                        Producing creative, fresh projects is the key to standing out. Unique side projects are the best place toinnovate,
                        but balancing commercially and creatively lucrative work is tricky. So, this article looks at</p>
                    <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, companies
                        are reaching out to digital agencies, responding to the new possibilities available. However, the industryis fast
                        becoming overcrowded, heaving with agencies offering similar services — on the surface, at least.
                        Producing creative, fresh projects is the key to standing out. Unique side projects are the best place toinnovate,
                        but balancing commercially and creatively lucrative work is tricky. So, this article looks at</p>
                </div>
            </article>
            <button type="submit" class="btn btn-primary btn-block"  onclick="window.location='/download/{{$book->id}}'">Скачать.</button>

        </div>

        <div class="col-lg-9 col-md-12">
            <div class="mb-5 border-top mt-4 pt-5">
                <h3 class="mb-4">Comments</h3>

                <div class="media d-block d-sm-flex mb-4 pb-4">
                    <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                        <img src="/images/post/user-01.jpg" class="mr-3 rounded-circle" alt="">
                    </a>
                    <div class="media-body">
                        <a href="#!" class="h4 d-inline-block mb-3">Alexender Grahambel</a>

                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,
                            vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                            lacinia congue felis in faucibus.</p>

                        <span class="text-black-800 mr-3 font-weight-600">April 18, 2020 at 6.25 pm</span>
                        <a class="text-primary font-weight-600" href="#!">Reply</a>
                    </div>
                </div>
                <div class="media d-block d-sm-flex">
                    <div class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                        <img class="mr-3" src="/images/post/arrow.png" alt="">
                        <a href="#!"><img src="/images/post/user-02.jpg" class="mr-3 rounded-circle" alt=""></a>
                    </div>
                    <div class="media-body">
                        <a href="#!" class="h4 d-inline-block mb-3">Nadia Sultana Tisa</a>

                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,
                            vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                            lacinia congue felis in faucibus.</p>

                        <span class="text-black-800 mr-3 font-weight-600">April 18, 2020 at 6.25 pm</span>
                        <a class="text-primary font-weight-600" href="#!">Reply</a>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="mb-4">Leave a Reply</h3>
                <form method="POST">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <textarea class="form-control shadow-none" name="comment" rows="7" required=""></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control shadow-none" type="text" placeholder="Name" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control shadow-none" type="email" placeholder="Email" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <input class="form-control shadow-none" type="url" placeholder="Website">
                            <p class="font-weight-bold valid-feedback">OK! You can skip this field.</p>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Comment Now</button>
                </form>
            </div>
        </div>
    </div>
@endsection
