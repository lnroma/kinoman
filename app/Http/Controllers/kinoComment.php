<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;

class kinoComment extends Controller
{

    /**
     * post request
     * @param Request $request
     */
    public function post(Request $request)
    {
        $kinoComment = new \App\kinoComment();
        $user = $request->user();

        $kinoComment->user_id = $user->id;
        $kinoComment->name = $user->name;
        $kinoComment->titles = $request->title;
        $kinoComment->message = $request->message;
        $kinoComment->kino_id = $request->kino_id;

        $kinoComment->save();

        header('Location:'.$request->back_url);
        die();
    }
}
