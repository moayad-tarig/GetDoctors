<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Doctor Page</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('assets/css/animate.min.css')}}" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('assets/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="{{ asset('assets/img/sidebar-5.jpg') }}">

            <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        {{ Auth()->user()->name }}
                    </a>
                </div>

                <ul class="nav">
                    <li class="">
                        <a href="{{ url('/home') }}">
                            <i class="fa fa-user"></i>
                            <p>الملف الشخصي</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="{{ route('request') }}">
                            <i class="pe-7s-graph"></i>
                            <p>الطلبات</p>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('accepted') }}">
                            <i class="pe-7s-graph"></i>
                            <p>  الطلبات المقبولة</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">الطلبات</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-dashboard"></i>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            تسجيل الخروج</button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="content">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
                @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
                @endif
                <div class="container-fluid">
                    <p class="text-danger">الطلبات المتوفرة حسب موقعك الجغرافي</p>
                    <div class="row">
                        @forelse ($requests as $request)

                        <div class="card col-sm-6 " style="width: 18rem;">

                            <div class="card-body text-center ">
                                <h5 class="card-title">name : <span class="text-success">{{ $request->name }} </span>
                                </h5>
                                <p class="card-text">note: <span class="text-success"> {{ $request->note }}  </span></p>
                                <p class="card-text"> Ask For : <span class="text-success"> {{ $request->specialtie }}
                                    </span></p>
                                <p class="card-text"> Phone Number : <span class="text-success"> {{
                                        $request->phone_number }} </span></p>
                                <a href="#" class="">
                                    <form action="{{ route('accept') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="name" value="{{ $request->name }}">
                                    <input type="hidden" name="id" value="{{ $request->id }}">
                                    <input type="hidden" name="note" value="{{ $request->note }}">
                                    <input type="hidden" name="specialtie" value="{{ $request->specialtie }}">
                                    <input type="text" name="area" value="{{ $request->area }}">
                                    <input type="hidden" name="phone_number" value="{{ $request->phone_number }}">
                                    <button type="submit" class="btn btn-primary">Accept</button>
                                    </form>
                                </a>
                            </div>
                        </div>
                        @empty
                        <p>لاتوجد طلبات في منطقتك الحالية</p>
                        @endforelse



                    </div>
                </div>
            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <p class="copyright pull-right">

                    </p>
                </div>
            </footer>

        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="{{ asset('assets/js/jquery.3.2.1.min.js')}} " type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}} " type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="{{ asset('assets/js/chartist.min.js')}} "></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/bootstrap-notify.js')}} "></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=1.4.0')}}"> </script>

<script src="{{ asset('assets/js/demo.js')}}"></script>



<script>
    // document.getElementById('special').getElementsByTagName('option')[{{ auth()->user()->specialtie }}].selected = 'selected'

      
</script>


</html>