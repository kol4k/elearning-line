<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    /**
     * @var Table
     */
    protected $table = 'access';
    /**
     * @var Fillable
     */
    protected $fillable = [
        'name'
    ];
}
