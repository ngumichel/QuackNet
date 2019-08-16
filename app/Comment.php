<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'quack_id',
    ];

    public function quack()
    {
        return $this->belongsTo('App\Quack');
    }

}
