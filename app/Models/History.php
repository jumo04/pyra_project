<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    public $fillable = ['day', 'winner', 'total', 'lottery_id'];

    public function lottery(){ 
        return $this->hasOne(Lottery::class);
    }   
}
