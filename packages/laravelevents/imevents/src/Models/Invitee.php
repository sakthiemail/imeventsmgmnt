<?php

namespace Laravelevents\ImEvents\Models;

use Laravelevents\ImEvents\Models\User;
use Laravelevents\ImEvents\Models\ImEvents;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Invitee extends Eloquent
{
    protected $table='invitees';
    protected $fillable = ['user_id','imevent_id'];

    public function users()
    {
        return $this->hasMany('Laravelevents\ImEvents\Models\User','id','user_id');
    }
}
