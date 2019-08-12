<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    //
}
