<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- style link --}}
    <link rel="stylesheet" href="{{ asset('css/operations.css') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" /> --}}
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
            <a href="#" class="logout_btn">Logout</a>
        </div>
    </header>
    {{-- header area end --}}

    {{-- sidebar start --}}
    <div class="sidebar">
        <center>
            <img src="{{ asset('images/1.png') }}" class="profile_image" alt="">
            <h4>Gallus</h4>
        </center>
        <a href="#"><i class="fas fa-desktop"></i> <span>Tableau de bord</span> </a>
        <a href="#"><i class="fas fa-cogs"></i> <span>Nokia vendor</span> </a>

        <a href="#"><i class="fas fa-table"></i> <span>Tableau de bord</span> </a>
        <a href="#"><i class="fas fa-wifi"></i> <span>Nokia vendor</span> </a>
        <a href="#"><i class="fas fa-server"></i> <span>Huawei vendor</span> </a>
        <a href="#"><i class="fas fa-info-circle"></i> <span>Documentations</span> </a>
        <a href="#"><i class="fas fa-sliders-h"></i> <span>Parametres</span> </a>
    </div>

    {{-- sidebar end --}}

<div class="content">
    <div class="container">
         <div class="container bg-light mt-5" style="height: 200px">
            <div class="card-header">
                Import file
            </div>
            <div class="card-body">
                <form action="" method="" enctype="multipart/form-data">
                    <input type="file" name="file" class="input_file" id="form-control"> <br>
                    <button class="btn btn-primary" style="margin-top: 20px">Importer</button>
                </form>
            </div>
        </div>
        @yield('section')
    </div>
</div>

<footer>

</footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
