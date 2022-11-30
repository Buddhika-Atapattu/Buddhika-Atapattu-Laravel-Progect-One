<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        'image',
        'content',
        'address',
        'latitude',
        'longitude',
        'city',
    ];
}
