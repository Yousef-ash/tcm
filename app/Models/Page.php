<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;


class Page extends Model
{
    use HasFactory,  PresentableTrait;



    protected $presenter = 'App\Presenters\PagePresenter';
    protected $fillable = [
        'title',
        'url',
        'view',
        'show',
        'header',
        'hero',
        'section',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function siblings()
    {
        if ($this->parent_id) {
            return self::where('parent_id', $this->parent_id)->where('id', '!=', $this->id)->get();
        } else {
            return collect();
        }
    }
    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }
}
