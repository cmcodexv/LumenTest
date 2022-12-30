<?php
 
namespace App;
use Illuminate\Database\Eloquent\Model;
 
class Booking extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'booking';
    protected $primaryKey = 'idbooking';
    public $timestamps = false;
}