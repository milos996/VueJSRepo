<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ToDo extends Model
{
    protected $table = 'todos';
    protected $fillable = [
        'title', 'note', 'is_priority', 'is_done','user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
