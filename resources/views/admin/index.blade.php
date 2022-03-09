<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Admin Page</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">

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
                    <li class="active">
                        <a href="dashboard.html">
                            <i class="fa fa-user"></i>
                            <p>الأطباء</p>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('requests') }}">
                            <i class="pe-7s-graph"></i>
                            <p>الطلبات</p>
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
                        <a class="navbar-brand" href="#"> الرئيسية</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-dashboard"></i>
                                </a> --}}
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
                    <div class="row">
                        <!-- content -->
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#exampleModalLong">
                            تسجيل طبيب جديد
                        </button>
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Phone_number</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)

                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $doctor->name }}</td>
                                    <td>{{ $doctor->email }}</td>
                                    <td>{{ $doctor->area }}</td>
                                    <td>{{ $doctor->phone_number }}</td>
                                    <td>
                                        <form action="/home/delete/{{$doctor->id}}" method="Post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden">
                                            <button class="btn btn-outline-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- end of content -->
                    </div>
                </div>
            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">

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



    <!-- Modal Add Doctor -->

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">تسجيل طبيب جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/home/register" class="form-group">
                        @csrf

                        <div class="form-group">

                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('الإسم') }}</label>


                            <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                        </div>


                        <div class="form-group">

                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('البريد الإلكتروني')
                                }}</label>


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror


                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">رقم الهاتف </label>
                            <input type="text"  class="form-control" id="exampleFormControlInput1" placeholder="" name="phone_number">
                        
                    </div>


                        <div class="form-group">



                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('الرقم السري')
                                }}</label>

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                        </div>
                        <div class="form-group">



                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('تأكيد الرقم
                                السري') }}</label>


                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">


                        </div>
                    

                        <div class="form-group">



                            <label for="exampleFormControlSelect1" class="h5"> منطقة العمل </label>
                            <select class="form-control" id="exampleFormControlSelect1" name="area">
                                <option value="khartoum">الخرطوم</option>
                                <option value="omdorman">امدرمان</option>
                                <option value="bahry">بحري</option>
                                <option value="east of the Nile">شرق النيل</option>
                                <option value="jabel awliya">جبل أولياء</option>
                            </select>

                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        {{ __('تسجيل') }}
                    </button> <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Add Doctor End -->


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script>
   

      
</script>


</html>