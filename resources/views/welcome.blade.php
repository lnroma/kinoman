<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>х.з.видео</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="nav-bar" style="background: #d4da48">
    <div class="links">
        <a href="catalog">Каталог фильмов</a>
    </div>
</div>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            х.з. видео
        </div>
        <form role="form" class="navbar-form" method="get" action="{{url('/searchresult')}}">
            <div class="form-group">
                <input class="form-controll" type="text" name="q"/>
            </div>
            <button type="submit" class="btn btn-success">
                Искать
            </button>
        </form>
    </div>

</div>
</body>
</html>
