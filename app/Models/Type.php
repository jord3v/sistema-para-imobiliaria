<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
