<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Str;

class HomeController extends Controller
{
    public function index()
    {
        $style = [
            'color-primary-style',
            'color-secondary-style',
            'color-extra01-style',
            'color-tertiary-style',
            'color-extra02-style',
            'color-extra03-style',
            'color-extra04-style',
            'color-extra05-style',
            'color-extra06-style',
        ];
        $posts_3 = Post::latest()->take(3)->get();
        $heros = Page::where('hero', 1)->where('show', 1)->get();
        $sections = Page::where('section', 1)->where('show', 1)->get();
        return view('home.welcome', compact('sections', 'heros', 'style', 'posts_3'));
    }

    public function search(Request $request)
    {
        $results = null;
        $keyword = null;
        if ($request->has('key')) {
            $keyword = $request->key;

            $posts = Post::select('title', 'caption', 'url', 'created_at')->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('caption', 'like', '%' . $keyword . '%')->orWhere('content', 'like', '%'. $keyword . '%');

            $pages = Page::select('title', 'content', 'url', 'created_at')->where('title', 'like', '%' . $keyword . '%')->orWhere('content', 'like', '%' . $keyword . '%')->where('show', 1);
            $results = $posts->union($pages)->paginate(5);
        }

        return view('home.search')->with('results', $results)->with('key', $keyword);
    }

}
