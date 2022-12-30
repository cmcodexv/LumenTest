<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Schedule extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'schedule';
    protected $primaryKey = 'idschedule';
    public $timestamps = false;
}