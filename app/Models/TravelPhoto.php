<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TravelPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'caption',
        'image_path',
        'location',
    ];

    /**
     * Get the user who uploaded the travel photo.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the full URL path of the uploaded image.
     */
    public function getUrlAttribute()
    {
        return Storage::url($this->image_path);
    }
}
