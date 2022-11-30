<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimatedSliderImages extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'selected_animation_id',
        'animation_main_section_id',
        'image',
    ];
}
