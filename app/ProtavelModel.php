<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProtavelModel extends Model
{
    use SoftDeletes;

    /**
     * fillable
     */
    protected $fillable = [];

    /**
     * guarded
     */
    protected $guarded = ['id', 'password', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * latest scope
     */
    public function latestScope()
    {
        $this->orderBy([
            'id'    =>  'desc',
            'created_at'    =>  'desc',
        ]);
    }
}
