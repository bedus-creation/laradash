<?php

namespace App\Traits\Laradash;

use App\Models\Laradash\Category;

trait HasCategory
{

    /**
     * Add Categories to Resume or Jobs
     */
    public function addCategory($data = [])
    {
        $categories = collect($data)->map(function ($item) {
            return Category::firstOrCreate(['name' => $item])->id;
        });
        $this->category()->sync($categories);
    }
    public function category()
    {
        return $this->morphToMany(Category::class, 'taggable', 'category_taggable', 'taggable_id', 'category_id');
    }
}
