<?php

namespace App;

use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'url', 'description', 'category_id', 'content', 'thumbnail'];
    protected $dates = ['published_at'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post){
            $post->tags()->detach();
        });
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function scopeAllowed($query)
    {
        if (auth()->user()->can('view', $this))
        {
            return $query;
        }
        
        return $query->where('user_id', auth()->id());
    }

    public function syncTags($tags)
    {
        $tagsIds = collect($tags)->map( function($tag) {
            return Tag::find($tag) ? $tag : Tag::create([ 'name' => $tag ])->id;
        });

        return $this->tags()->sync($tagsIds);
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $url = str_slug($title);
        $duplicateUrlCount = Post::where('url', 'LIKE', "{$url}%")->count();

        if ($duplicateUrlCount)
        {
            $url .= "-".uniqid();
        }
        
        $this->attributes['url'] = $url;
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
