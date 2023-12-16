<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{

    public function admin()
    {
        return view('admin.news.news')->with('posts', Post::paginate(15));
    }

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('home.blog')->with('posts', $posts);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(BlogRequest $request)
    {

        $data = $request->only(['title', 'content', 'caption']);

        $data['logo'] = null;
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $path = $request->file('logo')->store('posts', 'public');
            $data['logo'] = $path;
        }
        $data['url'] = 'الاخبار/' . count(Post::all());
        Auth::user()->posts()->save(new Post($data));


        return redirect()->route('newscontroller@admin')->with('status', 'تم انشاء منشور جديدة');
    }

    public function edit(string $id)
    {
        $data = Post::find($id);
        return view('admin.news.edit', compact('data'));
    }

    public function update(BlogRequest $request, Post $news)
    {
        $data = $request->only(['title', 'content', 'caption']);

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $path = $request->file('logo')->store('posts', 'public');
            $data['logo'] = $path;
        }
        $news->update($data);

        return redirect()->route('newscontroller@admin')->with('status', 'تم تعديل المنشور');
    }

    public function destroy(string $id)
    {
        Post::where('id', $id)->delete();
        return redirect()->route('newscontroller@admin')->with('status', 'تم حذف المنشور');
    }
}
