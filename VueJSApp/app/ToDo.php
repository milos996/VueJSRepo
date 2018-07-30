<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $table = 'todos';
    protected $fillable = [
        'title', 'note', 'is_priority', 'is_done',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
