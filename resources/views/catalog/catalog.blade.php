@extends('layouts.app')
<?php
/** @var App\Kino $catalog */
?>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Навигация и фильтры
                    </div>
                    <div class="panel-body">
                            @include('layouts.navigation')
                    </div>
                </div>
                {{--<div  class="panel panel-default">--}}
                    {{--<div class="panel-heading">--}}
                        {{--Новинки кино--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--Сдесь новинки кино--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">--}}
                        {{--Популярное кино--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--Сдесь популярное кино--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1><?php echo $category['title'] ?></h1></div>
                    <div class="panel-body">
                        <?php if (!isset($category['id'])) : ?>
                        {!! Breadcrumbs::render('category') !!}
                        <?php else: ?>
                        {!! Breadcrumbs::render('subCategory',$category) !!}
                        <?php endif;?>

                            <h2><?php echo $category['description'] ?></h2>
                            <br/>
                            @foreach($catalog->getCollection() as $_cat)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <?php echo $_cat->name ?>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <img width="100px" src="/uploads/images/<?php echo $_cat->src_tumb ?>"/>
                                        </div>
                                        <div class="col-md-8">
                                            <?php echo $_cat->short_description ?>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <a href="<?php echo url('/kino/'.$_cat->url_key) ?>" >Смотреть</a>
                                        Рейтинг:<?php echo $_cat->raiting ?>
                                        Коментарии: 0
                                    </div>
                                </div>
                            @endforeach
                            <?php echo $catalog->render() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection