<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // for soft deletes

class Meeting extends Model
{
    use HasFactory;
    use SoftDeletes; //add this line
 
    public $fillable = [ 'event_id', 'date', 'time', 'status'];
}
