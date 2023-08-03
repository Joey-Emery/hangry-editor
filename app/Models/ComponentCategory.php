<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ComponentCategory extends Model
{
    public $table = 'component_categories';

    public function components()
    {
        return $this->hasMany(Component::class, 'component_category_id', 'id');
    }
}