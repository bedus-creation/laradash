<?php

namespace App\Traits\Laradash;

use App\Models\Laradash\Tag;

trait HasTag
{
    /**
     * Add tags to Resume or Jobs
     */
    public function addTag($data = [])
    {
        $tags = collect($data)->map(function ($item) {
            return Tag::firstOrCreate(['name' => $item])->id;
        });
        $this->tag()->sync($tags);
    }

    public function tag()
    {
        return $this->morphToMany(Tag::class, 'taggable', 'tag_taggable', 'taggable_id', 'tag_id');
    }
}
