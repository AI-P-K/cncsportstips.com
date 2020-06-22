<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    // Table Name
    protected $table='tips';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
