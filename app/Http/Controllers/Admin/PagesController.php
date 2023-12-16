<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Requests\Pagesreq;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function index(request $request)
    {
        $pid = $request->pid;
        $pages = Page::where('parent_id', $pid)->paginate(15);
        return view('admin.pages.dashboard', compact('pages', 'pid'));
    }

    public function create(Request $request)
    {
        $pages = Page::select('*');
        if (!empty($request->pid)) {
            $pages = $pages->where('parent_id', $request->pid);
        } else {
            $pages = $pages->where('parent_id', NULL);
        }
        $orderPages = $pages->get();
        $pid = $request->pid;
        // dd($pid);
        return view('admin.pages.create', compact('orderPages', 'pid'));
    }

    public function store(Pagesreq $request)
    {
        $data = $request->only(['title', 'content']);
        $attributes = [
            'show' => $request->has('show'),
            'view' => $request->has('view'),
            'header' => $request->has('header'),
            'hero' => $request->has('hero'),
            'section' => $request->has('section'),
        ];

        // Retrieve parent page if specified
        $parentPage = null;
        if (!empty($request->orderPage)) {
            $parentPage = Page::findOrFail($request->orderPage);
        }

        $page = new Page($data + $attributes);
        $page->url = $parentPage ? $parentPage->url . '/' . $request->url : $request->url;

        Auth::user()->pages()->save($page);

        if ($parentPage) {
            $parentPage->children()->save($page);
        }

        return redirect()->back()->with('status', 'تم انشاء صفحة جديدة');
    }


    public function edit(Page $page, Request $request)
    {
        $pages = Page::select('*');

        if (!empty($request->pid)) {
            $pages = $pages->where('parent_id', $request->pid);
        } else {
            $pages = $pages->where('parent_id', NULL);
        }

        $orderPages = $pages->get();
        $pid = $request->pid;
        return view('admin.pages.edit', compact('page', 'orderPages', 'pid'));
    }


    public function update(Pagesreq $request, Page $page)
    {
        $data = $request->only(['title', 'url', 'content']);
        $attributes = [
            'show' => $request->has('show'),
            'view' => $request->has('view'),
            'header' => $request->has('header'),
            'hero' => $request->has('hero'),
            'section' => $request->has('section'),
        ];

        $parentPage = null;
        if (!empty($request->orderPage)) {
            $parentPage = Page::findOrFail($request->orderPage);
        }
        $page->update($data + $attributes);

        $page->parent()->associate($parentPage);
        $page->save();

        return redirect()->back()->with('status', 'تم تعديل الصفحة');
    }


    public function destroy($page)
    {
        $this->deletePageAndChildren($page);
        return redirect()->back()->with('status', 'تم حذف الصفحة');
    }


    protected function deletePageAndChildren($pageId)
    {
        // Get the page by its ID
        $page = Page::find($pageId);

        // Check if the page exists
        if (!$page) {
            return; // Page not found, no further action needed
        }

        // Get all the children of the current page
        $children = $page->children;

        // Recursively delete all children pages and their descendants
        foreach ($children as $child) {
            $this->deletePageAndChildren($child->id);
        }

        // Delete the current page
        $page->delete();
    }
}
