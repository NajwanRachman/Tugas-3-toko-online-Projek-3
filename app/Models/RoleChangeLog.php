<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleChangeLog extends Model
{
    protected $fillable = [
        'target_user_id',
        'old_role',
        'new_role',
        'actor_id',
    ];
}
