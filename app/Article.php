<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use SoftDeletes;

    /**
     * Related User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
