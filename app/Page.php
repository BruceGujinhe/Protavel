<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends ProtavelModel
{
    /**
     * fillable
     */
    protected $fillable = [];

    /**
     * guarded
     */
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
}
