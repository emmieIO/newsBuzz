<x-app>
    <div class="random-posts section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <main class="axil-content">

                        @foreach ($posts as $post)
                            <div class="media post-block post-block__mid m-b-xs-30">
                                <a href="post-format-standard.html" class="align-self-center"><img class=" m-r-xs-30"
                                        src="{{asset("images/posts/".$post->image)}}" alt=""></a>
                                <div class="media-body">
                                    <div class="post-cat-group m-b-xs-10">
                                        <a href="business.html" class="post-cat cat-btn bg-color-blue-one">{{$post->category->name}}</a>
                                    </div>
                                    <h3 class="axil-post-title hover-line hover-line"><a
                                            href="post-format-standard.html">{{$post->title}}</a></h3>
                                    <p class="mid">{{Str::limit($post->content, 100)}}</p>
                                    <div class="post-metas">
                                        <ul class="list-inline">
                                            <li>By <a href="#">Amachea Jajah</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End of .post-block -->
                        @endforeach
                        <!-- End of .post-block -->
                    </main>
                    <!-- End of .axil-content -->
                </div>
                <!-- End of .col-lg-8 -->

            </div>
            <!-- End of .row -->
        </div>
        <!-- End of .container -->
    </div>
</x-app>
