<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // for soft deletes

class EventSubscriber extends Model
{
    use HasFactory;
    use SoftDeletes; //add this line
 
    public $fillable = [ 'event_id', 'first_name', 'last_name', 'email', 'phone'];

    public function meetings()
    {
        return $this->hasMany("App\Models\Meeting");
    }
}
