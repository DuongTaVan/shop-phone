<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserK extends Model
{
    protected $table = 'UsersK';
    protected $primaryKey = 'U_id';
    protected $guarded = [];
}
