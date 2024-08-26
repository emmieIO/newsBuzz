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
        th, tr, td{
            white-space: nowrap;
        }
    </style>

</head>

<body style="background: url({{asset('dist/adminx/css/7c34f98d7b3e9ecb58ae.png')}});background-repeat:no-repeat;">
    <div class="d-flex align-items-center justify-content-center" style="height: 100vh">

        <div class="">
                        {{$slot}}
        </div>


    </div>

    <!-- essential   -->

    <!-- modal -->



    <!-- latest jquery-->
    <script src="{{asset("dist/adminx/js/jquery-3.6.3.min.js")}}"></script>

    <!-- Simple bar js-->
    <script src="{{asset("dist/adminx/vendor/simplebar/simplebar.js")}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset("dist/adminx/vendor/bootstrap/bootstrap.bundle.min.js")}}"></script>

    <!-- App js-->
    <script src="{{asset("dist/adminx/js/script.js")}}"></script>

    <!-- sweetalert js-->
    <script src="{{asset("dist/adminx/vendor/sweetalert/sweetalert.js")}}"> </script>

</body>

</html>
