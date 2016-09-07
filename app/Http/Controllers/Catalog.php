<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class Catalog extends Controller
{
    //
    public function index()
    {
        /** @var \Illuminate\Pagination\LengthAwarePaginator $catalog */
        $catalog = DB::table('kino')->paginate(5);

        $categoryInformation = array(
            'name' => 'Каталог самых топовых фильмов',
            'title' => 'Каталог самых топовых фильмов',
            'description' => 'Каталог самых топовых фильмов',
            'seo_title' => 'Каталог самых топовых фильмов',
            'seo_description' => 'Каталог самых топовых фильмов',
        );

        return view('catalog.catalog')
            ->with('catalog', $catalog)
            ->with('category',$categoryInformation)
            ->with('header', array(
                'title' => 'Катало лучших фильмов',
                'description' => 'Каталог лучших фильмов, лучшие фильмы всех времён и народов'
            ));
    }

    public function category($category)
    {
        $_catId =
            \App\category::where('url_key', $category)
                ->take(1)
                ->get();
        $catId = $_catId->toArray();
        $catId = $categoryInformation = reset($catId);
        $catId = $catId['id'];

        /** @var \Illuminate\Database\Query\Builder $catalog */
        $catalog = DB::table('kino')
            ->where('category_idsn', '=', $catId)
            ->paginate(5);

        return view('catalog.catalog')
            ->with('catalog', $catalog)
            ->with('category', $categoryInformation)
            ->with('header',array(
                'title' => 'Каталог фильмов '.$categoryInformation['name'],
                'description' => 'Каталог '.$categoryInformation['name'].' фильмы'
            ))
            ;
    }
}
