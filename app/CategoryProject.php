<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProject extends Model
{
    protected $fillable = ['name','url'];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
