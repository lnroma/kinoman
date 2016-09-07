<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;


class search extends Controller
{
    public function result(Request $request)
    {
        $kino = DB::table('kino')
            ->where('name','like','%'.$request->q.'%')
            ->paginate(5);

        return view('search.result')->with('kino',$kino);
    }
}
