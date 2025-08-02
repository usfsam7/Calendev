<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','description' , 'start_date', 'end_date', 'reminder_time'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
