<?php

namespace Laravelevents\ImEvents\Models;

use Laravelevents\ImEvents\Models\User;
use \Illuminate\Database\Eloquent\Model as Eloquent;

class ImEvents extends Eloquent
{
    protected $table='imevents';

    protected $fillable = ['title','start_date','end_date','user_id'];

    public function users()
    {
        return $this->hasMany('Laravelevents\ImEvents\Models\User');
    }
}
