<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Purpose extends Model
{
    public static function boot() {
        parent::boot();
        /**
         * Write code on Method
         *
         * @return response()
         */
        static::creating(function($model) {            
            $model->slug = Str::slug($model->name, '-');
        });
    }

    public function types()
    {
       return $this->hasMany(Type::class);
    }
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
