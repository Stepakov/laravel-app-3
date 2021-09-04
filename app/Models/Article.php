<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'slug', 'body', 'img', 'published_at' ];

    public $dates = [ 'published_at' ];

    public function state()
    {
        return $this->hasOne( State::class );
    }

    public function comments()
    {
        return $this->hasMany( Comment::class );
    }

    public function tags()
    {
        return $this->belongsToMany( Tag::class );
    }


    public function createdAtForHumans()
    {
        return $this->created_at->diffForHumans();
    }

    public function getPartOfBody()
    {
        return Str::substr( $this->body, 0, rand( 100, 150 ) );
    }

    public function scopeLastLimit( $query, $number )
    {
        return $query->with( 'state', 'tags' )->orderBy( 'created_at', 'DESC' )->take( $number )->get();
    }

    public function scopeAllPaginate( $query, $number )
    {
        return $query->with( 'state', 'tags' )->orderBy( 'created_at', 'DESC' )->paginate( $number );
    }

    public function scopeFindBySlug( $query, $slug )
    {
        return $query->with( 'state', 'tags', 'comments' )->where( 'slug', $slug )->firstOrFail();
    }

}
