<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // for soft deletes

class Event extends Model
{
    use HasFactory;
    use SoftDeletes; //add this line
 
    public $fillable = [ 'user_id', 'title', 'platform', 'description', 'link', 'type', 'duration', 'weekly_schedule', 'time_after', 'time_before' ];

    public function event_subscribers()
    {
        return $this->hasMany("App\Models\EventSubscriber");
    }

    public function meetings()
    {
        return $this->hasMany("App\Models\Meeting");
    }
}
