<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Management Bimbel Prestasi</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        body {
            background-image: url('bg.png');
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .navbar {
            margin-bottom: 0;
            background-color: rgba(255, 255, 255, 0.6); /* White background with 60% opacity */
            padding-left: 10px; /* Add padding to the left for logo */
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            max-height: 50px; /* Adjust max-height as needed */
            margin-right: 10px; /* Adjust margin for spacing */
        }

        .three-dots {
            font-size: 24px;
            cursor: pointer;
            position: absolute;
            top: 10px; /* Adjust top position */
            right: 10px; /* Adjust right position */
        }

        .rectangle-container {
            width: 360px;
            height: 227px;
            margin: 100px auto 0;
            position: relative;
            background-color: rgba(255, 255, 255, 0.6); /* White background with 60% opacity */
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        .upload-button {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .rectangle-image {
            max-width: 100%;
            max-height: 100%;
            margin-top: 20px; /* Adjusted margin for spacing */
        }

        .rectangle-header {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            align-items: center;
        }

        .rectangle-header-text {
            margin-left: 10px;
            font-weight: bold;
        }

        /* Adjusted styles for the dropdown menu */
        .dropdown-menu {
            margin-left: -30px; /* Shift the dropdown menu to the left by 30px */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{route('home')}}">
                            <img src="{{ asset('logo1.png') }}" alt="Logo">
                            DASHBOARD - Aplikasi Management Bimbel Prestasi
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user"></i> {{Auth::user()->email}} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a>Level: {{Auth::user()->role}}</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('actionlogout')}}"><i class="fa fa-power-off"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                    <div class="three-dots">
                        <!-- Add three-dot icon or any other icon you prefer -->
                        <i class="fas fa-bars"></i>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>

            @yield('konten')

            <div class="rectangle-container">
                <div class="rectangle-header">
                    <i class="fas fa-calendar fa-2x"></i>
                    <span class="rectangle-header-text">Jadwal</span>
                </div>
                @if(Auth::user()->role == 'Administrator')
    <button class="btn btn-primary upload-button" onclick="window.location.href='{{ route('upload.blade') }}'"><i class="fas fa-upload"></i> Unggah</button>              
@else
    <button class="btn btn-primary upload-button" onclick="downloadImage()"><i class="fas fa-download"></i> Unduh</button>
@endif
                <img src="{{ asset('cropped.jpg') }}" alt="Jadwal" class="rectangle-image" id="jadwalImage">
            </div>
        </div>
    </div>

    <div class="rectangle-container">
    <div class="rectangle-header">
        <i class="fas fa-calendar fa-2x"></i>
        <span class="rectangle-header-text">Pengumuman</span>
    </div>
    @if(Auth::user()->role == 'Administrator')
        <button class="btn btn-primary upload-button" onclick="window.location.href='{{ route('create.blade') }}'"><i class="fas fa-upload"></i> Unggah</button>              
    @else
        <button class="btn btn-primary upload-button" onclick="downloadImage()"><i class="fas fa-download"></i> Unduh</button>
    @endif
    <img src="{{ asset('pengumuman.jpg') }}" alt="Jadwal" class="rectangle-image" id="jadwalImage">

    <!-- Rectangle di sisi kanan -->
    <div class="rectangle-sisi-kanan">
        <!-- Isi Rectangle Sisi Kanan -->
    </div>
</div>
    
    

    <script>
        function downloadImage() {
            var image = document.getElementById('jadwalImage');
            var link = document.createElement('a');
            link.href = image.src;
            link.download = 'cropped.jpg';
            link.click();
        }
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
