<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['user_id', 'source', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return 'quotes/' . $this->id;
    }
}
