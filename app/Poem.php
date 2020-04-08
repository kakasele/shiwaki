<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poem extends Model
{
    protected $fillable = ['user_id', 'title', 'body', 'slug'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return 'poems/' . $this->slug;
    }
}
