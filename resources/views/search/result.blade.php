<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 02.09.16
 * Time: 7:48
 */
?>
@extends('layouts.app')
<?php
/** @var App\Kino $catalog */
?>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Результаты поиска:{{{$_GET['q']}}} </h1></div>
                    <div class="panel-body">
                        {!! Breadcrumbs::render('searchresult') !!}
                            <?php
                              $kinoCount = count($kino->getCollection()->toArray());
                            ?>
                            @if($kinoCount == 0)
                                Извините но по вашему запросу ничего не найденно
                                @else
                                Найдено: <?php echo $kinoCount ?>
                                @endif
                            @foreach($kino->getCollection() as $_cat)
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
