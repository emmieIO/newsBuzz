<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewBuzz::Admin</title>



    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/1.4.0/iconfont/tabler-icons.min.css" integrity="sha512-ciGmf5C95asLyZ9VH5MzLo3L9BqYodvQO5wfm/dXWDUBEF1Yq+a+GFwTF7RNBVt6LuocmyjRj92zG1cCNckYng==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <!-- prism css-->
    <link rel="stylesheet" type="text/css" href="/dist/adminx/vendor/prism/prism.min.css">

    <!-- Animation css -->
    <link rel="stylesheet" href="/dist/adminx/vendor/animation/animate.min.css">

    <!-- tabler icons-->
    <link rel="stylesheet" type="text/css" href="/dist/adminx/vendor/tabler-icons/tabler-icons.min.css">


    <!-- simplebar css-->
    <link rel="stylesheet" type="text/css" href="/dist/adminx/vendor/simplebar/simplebar.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/dist/adminx/vendor/bootstrap/bootstrap.min.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/dist/adminx/css/style.css">

    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/dist/adminx/css/responsive.css">

    <style>
        th,
        tr,
        td {
            white-space: nowrap;
        }
    </style>

</head>

<body>
    <div class="app-wrapper">
        <!-- Menu Navigation starts -->
        <nav class="dark-sidebar bg-primary">
            <div class="app-logo">
                <a class="logo d-inline-block" href="{{ route('admin.dashboard') }}">
                    <h4>NewsBuzz Admin</h4>
                </a>

                <span class="text-light toggle-semi-nav">
                    <i class="ti ti-chevrons-right f-s-20"></i>
                </span>
            </div>
            <div class="app-nav" id="app-simple-bar">
                <ul class="main-nav p-0 mt-2">
                    <li class="menu-title">
                        <span>Dashboard</span>
                    </li>
                    <li class="no-sub">
                        <a class="d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
                            <i class="ti ti-chart-treemap"></i>
                            <span>Overview</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#users"
                            aria-expanded="false">
                            <i class="ti ti-users"></i>
                            <span>Users</span>
                        </a>
                        <ul class="collapse" id="users">
                            <li><a href="{{ route('admin.users') }}">All Users</a></li>
                            <li><a href="{{ route('admin.users.add') }}">Add User</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#categories"
                            aria-expanded="false">
                            <i class="ti ti-category"></i>
                            <span>Categories</span>
                        </a>
                        <ul class="collapse" id="categories">
                            <li><a href="{{ route('admin.categories.index') }}">All Categories</a></li>
                            <li><a href="{{ route('admin.categories.create') }}">Add Category</a></li>
                        </ul>
                    </li>


                    <li>
                        <a class="d-flex align-items-center gap-2" data-bs-toggle="collapse" href="#posts"
                            aria-expanded="false">
                            <i class="ti ti-news"></i>
                            <span>Posts</span>
                        </a>
                        <ul class="collapse" id="posts">
                            <li><a href="{{ route('admin.posts.index') }}">All Posts</a></li>
                            <li><a href="{{ route('admin.posts.create') }}">Add Post</a></li>
                        </ul>
                    </li>

                </ul>
            </div>

            <div class="menu-navs">
                <span class="menu-previous"><i class="ti ti-chevron-left"></i></span>
                <span class="menu-next"><i class="ti ti-chevron-right"></i></span>
            </div>

        </nav>
        <!-- Menu Navigation ends -->

        <div class="app-content">
            <div>
                <!-- Header Section starts -->
                <header class="header-main">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6 d-flex align-items-center header-left">
                                                <span class="header-toggle me-3">
                                                    <i class="ti ti-category"></i>
                                                </span>

                                            </div>

                                            <div
                                                class="col-6 d-flex align-items-center justify-content-end header-right">
                                                <ul class="d-flex align-items-center">
                                                    <li class="header-search">
                                                        <a href="#" class="d-block head-icon" role=button
                                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                                                            aria-controls="offcanvasTop">
                                                            <i class="ti ti-search"></i>
                                                        </a>

                                                        <div class="offcanvas offcanvas-top search-canvas"
                                                            tabindex="-1" id="offcanvasTop">
                                                            <div class="offcanvas-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-grow-1">
                                                                        <form class="me-3 app-form app-icon-form "
                                                                            action="#">
                                                                            <div class="position-relative">
                                                                                <input type="search"
                                                                                    class="form-control"
                                                                                    placeholder="Search..."
                                                                                    aria-label="Search">
                                                                                <i class="ti ti-search f-s-15"></i>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="offcanvas"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="header-profile">
                                                        <div class="flex-shrink-0 dropdown">
                                                            <a href="#" class="d-block head-icon pe-0"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <img src="{{ asset('images/profile_pictures/' . auth()->user()->img) }}"
                                                                    alt="mdo" class="rounded-circle h-35 w-35">
                                                            </a>
                                                            <ul
                                                                class="dropdown-menu dropdown-menu-end header-card border-0 px-2">
                                                                <li
                                                                    class="dropdown-item d-flex align-items-center p-2">
                                                                    <span
                                                                        class="h-35 w-35 d-flex-center b-r-50 position-relative">
                                                                        <img src="{{ asset('images/profile_pictures/' . auth()->user()->img) }}"
                                                                            alt="" class="img-fluid b-r-50">
                                                                        <span
                                                                            class="position-absolute top-0 end-0 p-1 bg-success border border-light rounded-circle animate__animated animate__fadeIn animate__infinite animate__fast"></span>
                                                                    </span>
                                                                    <div class="flex-grow-1 ps-2">
                                                                        <h6 class="mb-0">{{ auth()->user()->name }}
                                                                        </h6>
                                                                        <p class="f-s-12 mb-0 text-secondary">
                                                                            {{ auth()->user()->role }}</p>
                                                                    </div>
                                                                </li>

                                                                <li class="app-divider-v dotted my-1"></li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center gap-2"
                                                                        href="{{ route('admin.users.profile') }}">
                                                                        <i class="ti ti-user-circle pe-1 f-s-18"></i>
                                                                        <span>Profile Detaiils</span>
                                                                    </a>
                                                                </li>

                                                                <li class="app-divider-v dotted my-1"></li>
                                                                <li class="app-divider-v dotted my-1"></li>
                                                                <li class="btn-light-danger b-r-5">
                                                                    <!-- Logout form -->
                                                                    <form action="{{ route('logout') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <button type="submit"
                                                                            class="dropdown-item mb-0 text-danger d-flex align-items-center gap-2">
                                                                            <i
                                                                                class="ti ti-logout pe-1 f-s-18 text-danger"></i>
                                                                            Log Out
                                                                        </button>
                                                                    </form>
                                                                </li>

                                                            </ul>
                                                        </div>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Header Section ends -->

                <!-- Body main section starts -->

                <main>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="container-fluid">
                        {{ $slot }}
                    </div>
                </main>

            </div>
        </div>

        <!-- Body main section ends -->

        <!-- tap on top -->
        <div class="go-top">
            <span class="progress-value">
                <i class="ti ti-arrow-up"></i>
            </span>
        </div>

        <!-- Footer Section starts-->
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-9 col-12">
                        <ul class="footer-text">
                            <li>
                                <p class="mb-0">Copyright © 2024 NewsBuzz. All rights reserved.</p>
                            </li>
                            <li> <a href="#"> V1.0.0 </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section ends-->

    </div>

    <!-- essential   -->

    <!-- modal -->



    <!-- latest jquery-->
    <script src="{{ asset('dist/adminx/js/jquery-3.6.3.min.js') }}"></script>

    <!-- Simple bar js-->
    <script src="{{ asset('dist/adminx/vendor/simplebar/simplebar.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('dist/adminx/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('dist/adminx/js/script.js') }}"></script>

    <!-- sweetalert js-->
    <script src="{{ asset('dist/adminx/vendor/sweetalert/sweetalert.js') }}"></script>

    @stack('scripts')
</body>

</html>
