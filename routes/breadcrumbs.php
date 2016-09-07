<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 01.09.16
 * Time: 18:59
 */

Breadcrumbs::register('home', function ($bread) {
    $bread->push('Домой', url('/'));
});

Breadcrumbs::register('category', function ($bread) {
    $bread->parent('home');
    $bread->push('Категории', url('catalog'));
});

Breadcrumbs::register('searchresult', function ($bread) {
    $bread->parent('home');
    $bread->push('Результаты поиска', url('searchresult'));
});

Breadcrumbs::register('subCategory', function ($bread, $category) {
    $bread->parent('category');
    $bread->push($category['name'], url('catalog/' . $category['url_key']));
});

Breadcrumbs::register('kino', function ($bread, $category) {
    $bread->parent('subCategory', $category);
//    $bread->push($kino['name'],url('kino/'.$kino['url_key']));
    $bread->push("kino", url('/'));
});