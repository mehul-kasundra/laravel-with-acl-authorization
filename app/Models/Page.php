<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = ['title', 'description', 'slug', 'status'];

    public function menus()
    {
        return $this->belongsToMany('App\Models\Menu')
            ->withPivot('menu_id', 'page_id', 'parent_id', 'sort_order')
            ->withTimestamps();
    }
}
