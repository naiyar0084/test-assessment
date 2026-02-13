<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

class Listing extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'city',
        'suburb',
        'pricing_model',
        'price',
        'status',
        'moderation_note',
    ];

    public function provider()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function booted()
    {
        static::saved(function ($listing) {
            Cache::forget("listing:{$listing->id}");
        });

        static::deleted(function ($listing) {
            Cache::forget("listing:{$listing->id}");
        });
    }
}
