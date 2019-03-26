<?php

namespace App\Models\Laradash;


use Illuminate\Database\Eloquent\Model;
use App\Traits\Laradash\HasCategory;
use App\Traits\Laradash\HasTag;

class Post extends Model
{
    use HasCategory, HasTag;

    protected $fillable = ["title", "slug", "body"];

    public function frontUrl()
    {
        return url('posts/' . $this->id . '/' . str_slug($this->title));
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
