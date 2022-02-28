<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Num extends Model
{
    use HasFactory;

    protected $table = 'num';
    
    public $fillable = ['num'];

    //relacion uno a muchos
    public function numlotteries(){ 
        return $this->HasMany('App\Models\NumLottery');
    }

}
