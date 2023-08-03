<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    public $table = 'components',
           $appends = ['contents', 'page_component_id', 'render_order'],
           $hidden = ['pivot'];

    public function getContentsAttribute()
    {
        return ($this->pivot && $this->pivot->contents) ? json_decode($this->pivot->contents, true) : null;
    }

    public function getPageComponentIdAttribute()
    {
        return ($this->pivot && $this->pivot->id) ? $this->pivot->id : null;
    }

    public function getRenderOrderAttribute()
    {
        return ($this->pivot && $this->pivot->render_order) ? $this->pivot->render_order : 0;
    }

    public function category()
    {
        return $this->hasOne(ComponentCategory::class, 'id', 'category_id');
    }

    public function scopeOrderedASC($query)
    {
        return $query->orderBy('pivot_render_order');
    }
}