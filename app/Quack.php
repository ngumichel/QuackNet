<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Quack
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quack query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quack whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Quack whereUpdatedAt($value)
 */
class Quack extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'image', 'tags', 'duck_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * Get the duck that owns the quack.
     */
    public function duck()
    {
        return $this->belongsTo('App\Duck');
    }

    /**
     * Get the quack for the reply post.
     */
    public function parent()
    {
        return $this->belongsTo('App\Quack', 'parent_id');
    }

    /**
     * Get the replies for the quack post.
     */
    public function children()
    {
        return $this->hasMany('App\Quack', 'parent_id');
    }

}
