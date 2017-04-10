<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends ProtavelModel
{
    /**
     * Related User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
