<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    use HasFactory;

    protected $table = 'lotteries';
    
    public $fillable = ['name', 'block', 'close'];

    //relacion muchos a muchos
    public function tickets(){ 
        return $this->belongsToMany(Ticket::class);
    }

    //relacion uno a muchos inversa
    public function numlotteries(){ 
        return $this->hasMany('App\Models\NumLottery');
    }

}
