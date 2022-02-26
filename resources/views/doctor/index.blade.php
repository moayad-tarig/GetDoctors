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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

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
                        <p>الملف الشخصي</p>
                    </a>
                </li>
                <li class="">
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
                    <a class="navbar-brand" href="#">الملف الشخصي</a>
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
                           <a >
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
                        {{-- Form --}}
                        <form class="w-50" method="POST" action="{{ url('doctor/update') }}" dir="rtl">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <label for="exampleFormControlInput1">اسم الطبيب</label>
                              <input type="text" value="{{ auth()->user()->name }}" class="form-control" id="exampleFormControlInput1" placeholder="" name="name">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">رقم الهاتف </label>
                              <input type="text" value="{{ auth()->user()->phone_number }}" class="form-control" id="exampleFormControlInput1" placeholder="" name="phone_number">
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlInput1">البريد الإلكتروني</label>
                              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ auth()->user()->email }}" name="email">
                            </div>

                            <div class="form-group">
                              <label for="exampleFormControlSelect1">تخصصك الحالي ({{ auth()->user()->specialtie }})</label>
                              <select class="form-control" id="special" name="specialtie">
                                <option value="medical" >طبيب عام</option>
                                <option value="medicine">اخصائي باطنية</option>
                                <option value="surgery">اخصائي جراحة</option>
                                <option value="obs">نساء وولادة</option>
                                <option value="pids">اخصائي أطفال</option>
                                <option value="nurse">ممرض</option>
                              </select>
                            </div>
                          
                            <div class="form-group">
                                <label for="exampleFormControlSelect1" class="h5">  منطقة العمل الحالية ({{ auth()->user()->area }})</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="area" >
                                  <option value="khartoum">الخرطوم</option>
                                  <option value="omdorman">امدرمان</option>
                                  <option value="bahry">بحري</option>
                                  <option value="east of the Nile">شرق النيل</option>
                                  <option value="jabel awliya">جبل أولياء</option>
                                </select>
                              </div>


                          
                            
                          
                            <div class="form-group d-block w-100">
                                <button type="submit" class="btn btn-success">حفظ</button>
                            </div>
                          </form>
                        {{-- Form End --}}
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
        // document.getElementById('special').getElementsByTagName('option')[{{ auth()->user()->specialtie }}].selected = 'selected'

      
    </script>


</html>
