<?php

Route::group(["namespace" => "App\Http\Controllers"], function () {
    Route::get('sitemap', 'Laradash\SitemapController');

    Route::group(['prefix' => config('laradash.base_route'), "namespace" => "Laradash"], function () {
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
        Route::resource('tags', 'TagController');
    });
});