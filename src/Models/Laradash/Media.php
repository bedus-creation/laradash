<?php

namespace App\Models\Laradash;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    protected $fillable = ["base_url", "in_json", "type"];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($media) {
            Storage::disk('public')->delete(json_decode($media->in_json)->images->small);
        });
    }

    public function size()
    {
        return optional(json_decode($this->in_json))->sizes->small ?? optional();
    }


    public function link($type = 'small')
    {
        if ($this == null) {
            return url('/img/profile.jpg');
        }

        $url = $this->base_url . json_decode($this->in_json)->images->$type;

        return $url === '' ? url('/img/profile.jpg') : $url;
    }
}
