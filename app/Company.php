<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function staff()
    {
        return $this->hasMany(Staff::class);
    }
}
