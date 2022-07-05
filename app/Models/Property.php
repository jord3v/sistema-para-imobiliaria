<?php

namespace App\Models;

use App\Filters\PropertyFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\{
    Traits\LogsActivity,
    LogOptions
};
use Spatie\MediaLibrary\{
    HasMedia,
    InteractsWithMedia,
    MediaCollections\Models\Media,
};

class Property extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, LogsActivity, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'description',
        'transactions',
        'measures',
        'composition',
        'purpose_id',
        'type_id'
    ];

    protected $casts = [
        'transactions'  => 'json',
        'measures'      => 'json',
        'composition'   => 'json',
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

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('media')
            ->nonQueued();
    }

    public function getActivitylogOptions(): LogOptions
    {
        
        return LogOptions::defaults()
        ->logFillable()
        ->useLogName('properties')
        ->setDescriptionForEvent(fn(string $eventName) => "<strong> :causer.name </strong> ".events($eventName)." o imóvel: <strong> :subject.purpose.name :subject.type.name - :subject.code </strong>");
    }

    public function modelFilter()
    {
        return $this->provideFilter(PropertyFilter::class);
    }

}
