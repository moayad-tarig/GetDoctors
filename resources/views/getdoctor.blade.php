<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>رعاية</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        * {
            font-family: 'Cairo', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .image {
            width: 100vw;
            min-height: 100vh;
            position: relative;
        }

        img {
            width: 100%;
            height: 100%;

        }

        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: black;
            opacity: 0.5;
        }

        .text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;


        }


        .text h1 {
            font-weight: 900;
            line-height: 1.7;
        }

        #get {
            font-size: 1.5rem;
        }

        #reg {
            font-size: 1.5rem;
        }
    </style>
</head>

<body class="antialiased">

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary" dir="rtl">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">رعــايــة</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active  text-light" aria-current="page" href="{{ url('/') }}">الرئيسيه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('login') }}">صفحة الطبيب</a>
                        </li>
                    


                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <div class="image">
        <img src="{{ asset('image/national-cancer-institute-NFvdKIhxYlU-unsplash.jpg') }}" alt="">
        <div class="overlay">
        </div>


        <div class="text ">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="left">
                <h2 class="text-white">
                    الرجاء ادخال معلوماتك الشخصية وسيتم التواصل معك من قبل أحد أطبائنا
                </h2>
            </div>
            <div class="right">
                <form dir="rtl" method="POST" action="{{ url('/getdoctor') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control mb-3" id="" aria-describedby="emailHelp"
                            placeholder="الاسم الثلاثي" name="name">

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control mb-2" id="" aria-describedby=""
                            placeholder="رقم الهاتف الخاص بك" name="phone_number">

                    </div>
                  

                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="h5 text-white"> المنطقة</label>
                        <select class="form-control mb-2" id="exampleFormControlSelect1" name="area">
                            <option value="khartoum">الخرطوم</option>
                            <option value="omdorman">امدرمان</option>
                            <option value="bahry">بحري</option>
                            <option value="east of the Nile">شرق النيل</option>
                            <option value="jabel awliya">جبل أولياء</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="text-white h5">الملاحظات</label>
                        <textarea class="form-control " id="exampleFormControlTextarea1" rows="3" name="note"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">أحصل على طبيبك الان</button>
                    <small id="emailHelp" class="form-text text-danger d-block">البيانات المدخلة سرية ولن يتطلع عليها
                        غيرالطبيب </small>

                </form>


            </div>


        </div>
    </div>





</body>

</html>