<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\{
    Traits\LogsActivity,
    LogOptions
};

class Contract extends Model
{
    use HasFactory, LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        
        return LogOptions::defaults()
        ->logFillable()
        ->useLogName('contracts')
        ->setDescriptionForEvent(fn(string $eventName) => "<strong> :causer.name </strong> ".events($eventName)." contrato: <strong>  :subject.title </strong> ");
    }
}
