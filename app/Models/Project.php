<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $table = 'projects';

    public function pages()
    {
        return $this->hasMany(Page::class, 'project_id', 'id');
    }
}