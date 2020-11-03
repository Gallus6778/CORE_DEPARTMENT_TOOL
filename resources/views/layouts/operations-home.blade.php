<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- style link --}}
    <link rel="stylesheet" href="{{ asset('css/operations.css') }}">

    {{-- script menu --}}
    {{--    <link rel="stylesheet" href="{{ asset('css/script-menu.css') }}">--}}

    {{--    <link href="{{ asset('css/menuEssai2.css') }}" rel="stylesheet">--}}

    {{--    <link href="{{ asset('css/menuEssai.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('css/generation-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu-operation-home.css') }}">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    @yield('style')

    <style>
        .breadcrumb li a{
            color: black;
        }
        .breadcrumb .current{
            color: #EE0F0F;
            font-weight: bold;
        }
    </style>
    <title>Document</title>

</head>
<body>
    <input type="checkbox" id="check">
    {{-- header area start --}}
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>

        <div class="left_area">
            <h3>daily <span>operations</span></h3>
        </div>
        <div class="righ_area">
            <a href="#"class="logout_btn">
                <button type="button" class="btn btn-danger">Logout</button>
            </a>
        </div>
    </header>
    {{-- header area end --}}

    {{-- sidebar start --}}
    <div class="sidebar">
        <center>
            <img src="{{ asset('images/1.jpg') }}" class="profile_image" alt="">
            <h4>BSS</h4>
        </center>
        <a href="#"><i class="fas fa-desktop"></i> <span>Dashboard</span> </a>
        <a href="{{ url('nokia2g-upgrade-capacity') }}"><i class="fas fa-cogs"></i> <span>Nokia vendor</span> </a>
        <a href="{{ url('huawei3g-xml') }}"><i class="fas fa-server"></i> <span>Huawei vendor</span> </a>
        <a href="#"><i class="fas fa-database"></i> <span>Update database</span> </a>
        <a href="#"><i class="fas fa-tools"></i> <span>Maintenance</span> </a>
        <a href="#"><i class="fas fa-info-circle"></i> <span>Documentations</span> </a>
        <a href="#"><i class="fas fa-sliders-h"></i> <span>Settings</span> </a>
    </div>


    {{-- sidebar end --}}

    <div class="content" style="overflow: auto; border-left:1px solid #EE0F0F;">


        <div class="container-fluid" style="margin-top: 70px">

{{--            @include('includes.menu2g_1')--}}
{{--            @include('includes.menu2g')--}}

            @yield('menu')

            <nav style="margin-left: -16px;" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @yield('breadcrump')
                </ol>
            </nav>
            {{-- <br> --}}
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">x</button>

                Upload Validation failed <br><br>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>
            @endif

            @if(Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                @yield('message_confirmation')
            </div>
            @endif

    @yield('content')
    @yield('error')

        </div>
    </div>

{{--    //////////////////////////////////////////////////////--}}

    <div style="background: #DEE3E7;z-index:10; margin-bottom: 0; height:8vh; text-align:center; padding-top:30px; border-top: 2px solid #fff;position: fixed;bottom: 0;right: 0; left: 0">
        <h6>
            <i class="fa fa-copyright" aria-hidden="true"></i>
            Copyright 2020+ BSS Tool Operations. All Rights Reserved.
        </h6>
        <h6>
{{--            BSS Tool Operetaions Limited.--}}
        </h6>
        <h6>
{{--            All Rights Reserved.--}}
        </h6>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script type="text/javascript">
    </script>
</body>
</html>
