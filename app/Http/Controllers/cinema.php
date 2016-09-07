<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class cinema extends Controller
{
    //
    public function index($urlKey)
    {
        $kino = new \App\Kino();
        $kino = $kino->where('url_key','=',$urlKey)->get()->toArray();
        $kino = reset($kino);

        $categoryInformation =
            \App\category::where('id', $kino['category_idsn'])
                ->take(1)
                ->get();
        $categoryInformation = $categoryInformation->toArray();
        $categoryInformation = reset($categoryInformation);

        return view('catalog.view.cinema')
            ->with('kino', $kino)
            ->with('category',$categoryInformation);
    }
}
