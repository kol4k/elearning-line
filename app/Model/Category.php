<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $primaryKey = "id";
    protected $fillable = [
        'name','description'
    ];

    public function task()
    {
        return $this->hasOne('task','id');
    }
}
