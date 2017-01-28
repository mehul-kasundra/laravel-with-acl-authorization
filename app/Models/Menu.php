<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table='menus';
    protected $fillable=['title', 'description', 'slug', 'status'];

    public function pages()
    {
        return $this->belongsToMany('App\Models\Page')
            ->withPivot('menu_id', 'page_id', 'parent_id', 'sort_order', 'title', 'status', 'pivot_id');
    }
}
