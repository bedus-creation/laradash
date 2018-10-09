<?php

namespace App\Http\Controllers\Utils;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class SitemapController extends Controller
{
    public function __invoke(Request $request)
    {
        $data=Post::all();
        $content = view('utils.sitemap', ["data"=>$data]);
        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
