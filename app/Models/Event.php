<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // for soft deletes

class Event extends Model
{
    use HasFactory;
    use SoftDeletes; //add this line
 
    public $fillable = [ 'user_id', 'title', 'platform', 'description', 'link', 'type', 'recurring' ];

    public function event_subscribers()
    {
        return $this->hasMany("App\EventSubscriber");
    }

    public function meetings()
    {
        return $this->hasOne("App\Meeting");
    }
}
