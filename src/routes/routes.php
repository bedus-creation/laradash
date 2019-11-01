<?php

// Route::get('sitemap', 'Laradash\SitemapController');
// Route::get(config('laradash.base_route') . '/command/{command}', 'Laradash\CommandController');

Route::group(['prefix' => config('laradash.base_route'), "namespace" => "Laradash"], function () {
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');
    Route::resource('medias', 'MediaController')->only(['index', 'store']);
});
