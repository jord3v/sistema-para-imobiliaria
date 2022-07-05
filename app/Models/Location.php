<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Location extends Model
{
    use HasFactory;

    public static function boot() {
        parent::boot();
        /**
         * Write code on Method
         *
         * @return response()
         */
        static::creating(function($model) {            
            $model->neighborhood_slug = Str::slug($model->neighborhood, '-');
            $model->city_slug = Str::slug($model->city, '-');
        });
    }

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'zipcode',
        'public_place',
        'number',
        'complement',
        'neighborhood',
        'city',
        'neighborhood_slug',
        'city_slug',
        'state',
    ];

    public function locatable()
    {
        return $this->morphTo();
    }
}
