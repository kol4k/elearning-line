<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "tasks";
    protected $primaryKey = "id";
    protected $fillable = [
        'question','a','b','c','d','answer','category'
    ];

    public function task()
    {
        return $this->belongsTo('categories','id');
    }
}
