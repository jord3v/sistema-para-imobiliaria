<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'description',
        'transactions',
        'purpose_id',
        'type_id'
    ];

    protected $casts = [
        'transactions' => 'json'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function purpose()
    {
       return $this->belongsTo(Purpose::class,  'purpose_id',  'id' );
    }

    public function type()
    {
       return $this->belongsTo(Type::class,  'type_id',  'id' );
    }

    public function location()
    {
        return $this->morphOne(Location::class, 'locatable');
    }
}
