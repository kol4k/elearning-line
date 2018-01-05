<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "tasks";
    protected $primaryKey = "id";
    protected $fillable = [
        'question','answer','category'
    ];

    public function task()
    {
        return $this->belongsTo('categories','id');
    }
}
