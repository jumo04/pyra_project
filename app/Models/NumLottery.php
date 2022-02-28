<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumLottery extends Model
{
    use HasFactory;

    
    //relacion uno a muchos inversa
    public function num(){ 
        return $this->belongsTo('App\Models\Num');
    }

    public function lottery(){ 
        return $this->belongsTo('App\Models\Lottery');
    }
}
