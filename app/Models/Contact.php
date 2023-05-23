<?php

namespace App\Models;

use DateTime;
use App\Models\Notes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date_of_birth' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Notes::class);
    }

    public function name(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->first_name . ' ' . $this->last_name
        );
    }

    public function avatar(): Attribute
    {
        $name = trim(collect([$this->first_name, $this->last_name])->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        $photo = 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF';

        return Attribute::make(
            get: fn () => $photo
        );
    }

    public function scopeUpcomingBirthdays(Builder $builder): Builder
    {
        return $builder->whereRaw("DATE_ADD(date_of_birth, INTERVAL YEAR(CURDATE()) - YEAR(date_of_birth) + IF(DAYOFYEAR(date_of_birth), 0, 1) YEAR) BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 90 DAY)");
    }
}
