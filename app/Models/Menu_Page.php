<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu_Page extends Model
{
    protected $table = 'menu_page';
    protected $fillable = ['menu_id', 'page_id', 'parent_id', 'sort_id', 'title', 'status'];
}