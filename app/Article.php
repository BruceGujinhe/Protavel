<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends ProtavelModel
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'title', 'content'];

    /**
     *
     */
    public function latestScope()
    {
        $this->orderBy([
            'id'    =>  'desc',
            'created_at'    =>  'desc',
        ]);
    }

    /**
     * Related User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
