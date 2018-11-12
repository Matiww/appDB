<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'name', 'amount'
    ];

    protected $table = 'items';

    public $timestamps = false;

}
