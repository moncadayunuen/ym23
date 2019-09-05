<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title','description','client','website','created','thumbnail','content'];
    protected $dates = ['created'];

    public function getRouteKeyName()
    {
        return 'title';
    }

    public function category_project()
    {
        return $this->belongsTo(CategoryProject::class);
    }
}
