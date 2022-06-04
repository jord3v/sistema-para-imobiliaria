<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'description',
        'price',
        'due_date',
        'payment_date',
        'status',
        'flow',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
