<?php //var_dump($header); die;?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        <?php if(isset($header['title'])): ?>
            <?php echo $header['title'] ?>
        <?php else: ?>
        Только отборное кино для просмотра вечером под пиво
        <?php endif; ?>
    </title>

    <meta name="description" content="
        <?php if(isset($header['description'])): ?>
            <?php echo $header['description'] ?>
        <?php else: ?>
            Фильмы, кино, всё для приятного время припровождения мы ждём вас на нашем сайте!
        <?php endif; ?>
            "/>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
@include('layouts.mainmenu')
@yield('content')

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
