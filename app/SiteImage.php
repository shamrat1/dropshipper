<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteImage extends Model
{
    public function imageable()
    {
        return $this->morphTo();
    }
}
