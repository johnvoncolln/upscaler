<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScaleObject extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $fillable = [
        'email',
        'replicate_id',
        'replicate_img_url',
    ];
}
