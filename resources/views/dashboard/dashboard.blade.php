<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width. intial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

       <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 

    <title>Tubes</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <div class="header">
                        <p class="navbar-brand fs-2">Tubes</p>
                    </div>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        
                        <li>
                            <a href="{{url('penduduks')}}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-peope"></i> <span
                                    class="ms-1 d-none d-sm-inline text-light">Data Penduduk</span></a>
                        </li>
                        <li>
                            <a href="{{url('kartus')}}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-peope"></i> <span
                                    class="ms-1 d-none d-sm-inline text-light">Data Kartu Keluarga</span></a>
                        </li>
                        <li>
                            <a href="{{url('rukuns')}}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-peope"></i> <span
                                    class="ms-1 d-none d-sm-inline text-light">Data RT</span></a>
                        </li>
                        <li>
                            <a href="{{url('/')}}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-peope"></i> <span
                                    class="ms-1 d-none d-sm-inline text-light">Home</span></a>
                        </li>
                        <li>
                            <a href="{{ route('show.index')}}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-peope"></i> <span
                                    class="ms-1 d-none d-sm-inline text-light">Profile</span></a>
                        </li>
                        <li>
                            <a href="{{ route('logout.perform') }}" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-peope"></i> <span
                                    class="ms-1 d-none d-sm-inline text-light">Logout</span></a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col py-3">
                <nav class="navbar navbar-light bg-light justify-content-end border-bottom">
                    <strong class="navbar-brand" style="font-size:25px">{{ old('name', Auth::user()->name) }}</strong>
                </nav>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>