<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Activitylog\{
    Traits\LogsActivity,
    LogOptions
};

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia, HasRoles, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function registerMediaCollections(Media $media = null): void
    {
        $this
            ->addMediaCollection('thumb')
            ->singleFile();
            //->withResponsiveImages();
    }

    public function getActivitylogOptions(): LogOptions
    {
        
        return LogOptions::defaults()
        ->logFillable()
        ->useLogName('users')
        ->setDescriptionForEvent(fn(string $eventName) => "<strong> :causer.name </strong> ".events($eventName)." o usuário de sistema: <strong> :subject.name </strong>");
    }
}
