<?php

namespace Laravelevents\ImEvents\Models;
use App\User as CoreUser;

class User extends CoreUser
{
    protected $table='users';

    public function ImEvents()
    {
        return $this->hasMany('Laravelevents\ImEvents\Models\ImEvents');
    }
}
