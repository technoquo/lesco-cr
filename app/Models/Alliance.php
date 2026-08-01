<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alliance extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'logo',
        'url',
        'order',
    ];
}
