<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 01.09.16
 * Time: 20:02
 */
/** @var \Illuminate\Database\Query\Builder $catalog */
$comments = DB::table('kino_comment')
        ->where('kino_id', '=', $kino['id'])
        ->paginate(5);
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
                    <div class="panel-heading">
                        <?php echo $kino['name'] ?>
                    </div>
                    <div class="panel-body">
                        <?php echo Breadcrumbs::render('kino', $category, $kino) ?>
                        <video controls width="100%">
                            <source src="<?php echo $kino['src'] ?>" type="video/mp4">
                        </video>
                        <?php echo $kino['description'] ?>
                        <hr/>
                        Коментарии:
                        <hr/>
                            <?php foreach($comments->getCollection() as $_com): ?>
                                <?php echo $_com->name ?> : <?php echo $_com->titles ?><br/>
                                <?php echo $_com->message ?>
                                <br/>
                            <?php endforeach; ?>
                        <hr/>
                        <?php echo $comments->render() ?>
                        <hr/>
                        @if (Auth::guest())
                            <a href="{{ url('/login') }}">Авторизуйтесь</a>
                            или <a href="{{ url('/register') }}">Зарегистрируйтесь</a>
                            что бы оставить коментарий.
                        @else
                            <form method="post" role="form" action="{{ url('/comment/post') }}"/>
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                            <input type="hidden" name="back_url" value="{{ Request::url() }}">
                            <input type="hidden" name="kino_id" value="{{ $kino['id'] }}"/>
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input id="title" class="form-control" type="text" name="title"/>
                            </div>
                            <div class="form-group">
                                <label for="message">Сообщение</label>
                                <textarea id="message" class="form-control" name="message"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default" type="submit">
                                    Коментировать
                                </button>
                            </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

