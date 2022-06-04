<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'property_id',
        'start_period',
        'payment',
        'period',
        'rental_price',
        'condominium_price',
        'administration_fee',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function customers()
    {
        return $this->morphToMany(Customer::class, 'aggregate')->withPivot('link');
    }
}
