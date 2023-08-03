<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PageComponent extends Model
{
    public $table = 'page_components',
           $fillable = ['render_order'];

    public function page()
    {
        return $this->hasOne(Page::class, 'id', 'page_id');
    }

    public function components()
    {
        return $this->hasMany(Component::class, 'id', 'component_id');
    }
}