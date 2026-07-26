<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'role',
        'bio',
        'photo',
        'order',
    ];
}
