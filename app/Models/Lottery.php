<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    use HasFactory;

    protected $table = 'lotteries';
    
    public $fillable = ['name', 'block', 'close'];

    
    public function ticket(){ 
        return $this->belongsTo(Ticket::class);
    }   
    

}
