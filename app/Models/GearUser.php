<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GearUser extends Pivot
{
    protected $table = 'gear_users';
}
