<x-app>

    <!-- Banner starts -->
    <section class="banner banner__default bg-grey-light-three">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="post-date perfect-square bg-primary-color" style="height: 160px;">
                        {{ $post->created_at->format('F') }} <span>{{ $post->created_at->format('j') }}</span>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="post-title-wrapper">
                        <div class="btn-group">
                            <a href="#" class="cat-btn bg-color-blue-one">{{ $post->category->name }}</a>
                        </div>
                        <h2 class="m-b-xs-0 axil-title hover-line">{{ $post->title }}</h2>
                        <div class="post-metas banner-post-metas m-t-xs-10">
                            <ul class="list-inline">
                                <li><a href="#" class="post-author post-author-with-img"><img
                                            src="{{ asset('images/profile_pictures/' . $post->user->img) }}"
                                            alt="author">{{ $post->user->name }}</a></li>
                            </ul>
                        </div>
                        <!-- End of .post-metas -->
                    </div>
                    <!-- End of .post-title-wrapper -->
                </div>
                <!-- End of .col-lg-8 -->
            </div>
        </div>
        <!-- End of .container -->
    </section>
    <!-- End of .banner -->

    <!-- post-single-wrapper starts -->
    <div class="post-single-wrapper p-t-xs-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <main class="site-main">
                        <article class="post-details">
                            <div class="single-blog-wrapper">
                                <p>{{$post->content}}</p
                            </div>
                            <!-- End of .single-blog-wrapper -->
                        </article>
                        <!-- End of .post-details -->


                        <hr class="m-t-xs-50 m-b-xs-60">

                        <div class="comment-box">
                            <h2>Leave A Reply</h2>
                            <p>Your email address will not be published. Required fields are marked <span
                                    class="primary-color">*</span></p>
                        </div>
                        <!-- End of .comment-box -->

                        <form action="#" class="comment-form row m-b-xs-60">
                            <div class="col-12">
                                <div class="form-group comment-message-field">
                                    <label for="comment-message">Comment</label>
                                    <textarea name="comment-message" id="comment-message" rows="6"></textarea>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" name="website" id="website">
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary">POST COMMENT</button>
                            </div>
                        </form>

                        <!-- End of .post-navigation -->
                    </main>
                    <!-- End of main -->
                </div>
                <!--End of .col-auto  -->

                <div class="col-lg-4">
                    <aside class="post-sidebar">
                        <div class="newsletter-widget weekly-newsletter bg-grey-light-three m-b-xs-40">
                            <div class="newsletter-content">
                                <div class="newsletter-icon">
                                    <i class="feather icon-send"></i>
                                </div>
                                <div class="section-title">
                                    <h3 class="axil-title">Subscribe To Our Weekly Newsletter</h3>
                                    <p class="mid m-t-xs-10 m-b-xs-20">No spam, notifications only about new
                                        products,
                                        updates.</p>
                                </div>
                                <!-- End of .section-title -->

                                <div class="subscription-form-wrapper">
                                    <form action="#" class="subscription-form">
                                        <div class="form-group form-group-small m-b-xs-20">
                                            <label for="subscription-email">Enter Email Address</label>
                                            <input type="text" name="subscription-email" id="subscription-email">
                                        </div>
                                        <div class="m-b-xs-0">
                                            <button class="btn btn-primary btn-small">SUBSCRIBE</button>
                                        </div>
                                    </form>
                                    <!-- End of .subscription-form -->
                                </div>
                                <!-- End of .subscription-form-wrapper -->
                            </div>
                            <!-- End of .newsletter-content -->
                        </div>
                        <!-- End of  .newsletter-widget -->
                        <!-- End of .category-widget -->

                        <div class="post-widget sidebar-post-widget m-b-xs-40">
                            <h4 class="nav mb-3 row no-gutters">
                               Similar posts from other authors
                            </h4>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="recent-post">
                                    <div class="axil-content">
                                        @foreach ($similarPosts as $post )
                                        <div class="media post-block post-block__small">
                                            <a href="post-format-standard.html" class="align-self-center"><img
                                                    class=" m-r-xs-30" src="{{asset("images/posts/".$post->image)}}"
                                                    alt="media image"></a>
                                            <div class="media-body">
                                                <div class="post-cat-group">
                                                    <a href="post-format-standard.html"
                                                        class="post-cat color-blue-three">{{$post->category->name}}</a>
                                                    
                                                </div>
                                                <h4 class="axil-post-title hover-line hover-line"><a
                                                        href="post-format-standard.html">{{$post->title}}</a></h4>
                                                <div class="post-metas">
                                                    <ul class="list-inline">
                                                        <li>By <a href="#">{{$post->user->name}}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        @endforeach
                                        <!-- End of .post-block -->
                                    </div>
                                    <!-- End of .content -->
                                </div>
                                <!-- End of .tab-pane -->
                            </div>
                            <!-- End of .tab-content -->
                        </div>
                        </div>
                    </aside>
                    <!-- End of .post-sidebar -->
                </div>
                <!-- End of .col-lg-4 -->
            </div>
            <!-- End of .row -->
        </div>
        <!-- End of .container -->
    </div>
    <!-- End of .post-single-wrapper -->
</x-app>
