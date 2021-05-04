<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function places(){ 
        return $this->belongsTo(Place::class);
    }   

    public function lotterys(){ 
        return $this->belongsTo(Lottery::class);
    }  

    public $fillable = ['name', 'num', 'place_id', 'lottery_id', 'total'];

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

}
