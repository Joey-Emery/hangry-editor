<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $table = 'pages';

    public function components()
    {
        return $this->belongsToMany(Component::class, 'page_components')
            ->orderedASC()
            ->withPivot('contents', 'render_order', 'id');
    }

    public function getNextRenderOrder()
    {
        return (!$this->components->isEmpty()) ? ($this->components->last()->render_order + 1) : 1;
    }
}