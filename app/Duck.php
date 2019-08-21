<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Duck
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Duck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Duck newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Duck query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $duckname
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Duck whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Duck whereDuckname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Duck whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Duck whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Duck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Duck whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Duck wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Duck whereUpdatedAt($value)
 */
class Duck extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'duckname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [
        'is_admin'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the quacks for the user.
     */
    public function quacks()
    {
        return $this->hasMany('App\Quack');
    }

}
