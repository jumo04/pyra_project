<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';


    public function user(){ 
        return $this->belongsTo(User::class);
    }   

    public function lotteries(){ 
        return $this->hasMany(Lottery::class);
    }  

    public $fillable = ['name', 'num', 'total'];

    
    public function setNumAttribute($value)
    {
        $this->attributes['num'] = json_encode($value);
    }

    /**
     * Get the categories
     *
     */
    public function getNumAttribute($value)
    {
        return $this->attributes['num'] = json_decode($value);
    }


    

   /*  public function setLotteryAttribute($value)
    {
        $this->attributes['lottery'] = json_encode($value);
    }
 */
    /**
     * Get the categories
     *
     */
    /* public function getLotteryAttribute($value)
    {
        return $this->attributes['lottery'] = json_decode($value);
    } */

}
