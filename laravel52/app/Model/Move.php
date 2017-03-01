<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    protected $table='movie';
    protected $primaryKey='movie_id';
    public $timestamps=false;
    protected $guarded=[];
}
