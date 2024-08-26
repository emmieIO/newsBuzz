<x-app>

    <div class="fluid-post-wrapper p-t-xs-15 p-t-sm-30">
        <div class="container-fluid p-l-md-30 p-r-md-30">
            <div class="row">
                @if($randomPosts->count())
                <div class="col-xl-4 col-lg-6">
                    <div class="axil-content owl-carousel axil-post-carousel" data-owl-items="1"
                        data-owl-loop="true" data-owl-autoplay="true" data-owl-dots="false" data-owl-nav="true"
                        data-owl-margin="0" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                        @foreach ($randomPosts as $post )
                        <div class="item">
                            <div class="axil-img-container video-container__type-2 m-b-xs-15 m-b-sm-30">
                                <a href="{{route('post-detail', $post->slug)}}" class="d-block">
                                    <img src="{{asset("images/posts/".$post->image)}}" alt="video post"
                                        class="img-fluid">
                                    <div class="grad-overlay grad-overlay__transparent"></div>

                                </a>
                                <div class="media post-block  position-absolute m-b-xs-30">
                                    <div class="media-body media-body__big">
                                        <div class="axil-media-bottom mt-auto">
                                            <div class="post-cat-group m-b-xs-10">
                                                <a href="{{route('post-by-category', $post->category->slug)}}"
                                                    class="post-cat cat-btn btn-big bg-color-red-two">{{$post->category->name}}</a>
                                            </div>
                                            <h3 class="axil-post-title hover-line"><a
                                                    href="{{route('post-detail', $post->slug)}}">{{$post->title}}</a></h3>
                                            <div class="post-metas">
                                                <ul class="list-inline">
                                                    <li>By <a href="#" class="post-author">{{$post->user->name}}</a>
                                                    </li>
                                                    <li><i class="dot">.</i>{{ $post->created_at->diffForHumans() }}</li>
                                                    <li><a href="#"><i class="fa fa-envelope"></i>5k
                                                            Comments</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of .media-body -->
                                </div>
                                <!-- End of .post-block -->
                            </div>
                            <!-- End of .axil-img-container -->
                        </div>
                        @endforeach
                        <!-- End of .item -->
                    </div>
                    <!-- End of .owl-carousel -->
                </div>
                @endif
                <div class="col-xl-8 col-lg-6">
                    <div class="y-scroll-container" data-x-scroll="false">
                        <div class="row gutter-40">
                            @if($posts->count())
                                @foreach ($posts as $post )
                                <div class="col-xl-4 col-sm-6">
                                    <div class="axil-img-container m-b-xs-15 m-b-sm-30">
                                        <a href="{{route('post-detail', $post->slug)}}" class="d-block">
                                            <img src="{{asset("images/posts/".$post->image)}}"
                                                alt="gallery images">
                                            <div class="grad-overlay grad-overlay__transparent"></div>
                                        </a>
                                        <div class="media post-block grad-overlay position-absolute">
                                            <div class="media-body justify-content-end">
                                                <div class="post-cat-group m-b-xs-10">
                                                    <a href="{{route('post-by-category',$post->category->slug)}}"
                                                        class="post-cat cat-btn btn-mid bg-color-purple-one">{{$post->category->name}}</a>
                                                </div>
                                                <div class="axil-media-bottom">
                                                    <h3 class="axil-post-title hover-line m-b-xs-0"><a
                                                            href="{{route('post-detail', $post->slug)}}">{{$post->title}}</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of .post-block -->
                                    </div>
                                    <!-- End of .axil-img-container -->
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- End of .row -->
                    </div>
                </div>
                <!-- End of .col-lg-8 -->
            </div>
            <!-- End of .row -->
        </div>
        <!-- End of .container-fluid -->
    </div>
</x-app>