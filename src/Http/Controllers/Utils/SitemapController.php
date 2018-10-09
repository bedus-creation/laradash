<?php

namespace App\Http\Controllers\Utils;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public function __invoke(Request $request)
    {
        $data=[];
        $content = view('utils.sitemap', ["data"=>$data]);
        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
