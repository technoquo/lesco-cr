<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'role',
        'photo',
        'content',
        'order',
    ];
}
