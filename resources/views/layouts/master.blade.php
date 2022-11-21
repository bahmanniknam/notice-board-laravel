<html>
<head>
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Script -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js' type='text/javascript'></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>

    <link rel="preconnect" href="//fdn.fontcdn.ir">
    <link rel="preconnect" href="//v1.fontapi.ir">
    <link href="https://v1.fontapi.ir/css/Yekan" rel="stylesheet">
    <style>
    table,
    thead,
    tr,
    tbody,
    th,
    td {
        text-align: center;
    }
    body {
        font-family: Yekan, sans-serif;
    }
    table th {
        width: auto !important;
    }
    </style>


</head>

<body class="container-fluid bg-secondary p-0 ">

@section('navbar')
    <nav class="navbar navbar-light bg-light ">
        <h4>
        <a class="font-weight-bold text-uppercase text-dark text-left" href="{{ route('notice.index') }}" style="font-family:'Segoe UI Historic'">
            <img src={{url('/images/noticeBoard.png')}}  height="50" width="50"/>
            Notice Board
        </a>
        </h4>
    </nav>
@show

<div class="container">
    @yield('content')
</div>
<div class="text-center footer navbar-bottom mt-5 pt-5">
    <h4>+98 935 340 8923</h4>
    <h4 class="text-white">nightbn1990@gmail.com</h4>
    <h4>Github: <a class="text-white" href="http://github.com/bahmanniknam">github.com/bahmanniknam</a></h4>

</div>
</body>

</html>
