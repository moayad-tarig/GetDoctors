<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>أحصل على طبيبك</title>

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
                <a class="navbar-brand text-light" href="#">Care Unit</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active  text-light" aria-current="page" href="#">الرئيسيه</a>
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
            <div class="left">
                <h1 class="text-white">أحصل على طبيبك الأن</h1>
            </div>
            <div class="right">
       
                  
                    <a type="submit" class="btn btn-primary mt-2 " id="get" href="{{ url('/getdoctor') }}">أطلب طبيب الأن </a>


                    
                    
                </div>
                <a class="btn btn-success mt-3" id="reg" href="{{ route('register') }}">سجل معنا كـطبيب</a>


        </div>
    </div>





</body>

</html>