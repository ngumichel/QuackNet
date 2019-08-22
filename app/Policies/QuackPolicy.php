<?php

namespace App\Policies;

use App\Duck;
use App\Quack;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuackPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any quacks.
     *
     * @param  \App\Duck  $user
     * @return mixed
     */
    public function viewAny(Duck $user)
    {
        //
    }

    /**
     * Determine whether the user can view the quack.
     *
     * @param  \App\Duck  $user
     * @param  \App\Quack  $quack
     * @return mixed
     */
    public function view(Duck $user, Quack $quack)
    {
        //
    }

    /**
     * Determine whether the user can create quacks.
     *
     * @param  \App\Duck  $user
     * @return mixed
     */
    public function create(Duck $user)
    {
        //
    }

    /**
     * Determine whether the user can update the quack.
     *
     * @param  \App\Duck  $user
     * @param  \App\Quack  $quack
     * @return mixed
     */
    public function update(Duck $user, Quack $quack)
    {
        return $user->id === $quack->duck_id;
    }

    /**
     * Determine whether the user can delete the quack.
     *
     * @param  \App\Duck  $user
     * @param  \App\Quack  $quack
     * @return mixed
     */
    public function delete(Duck $user, Quack $quack)
    {
        return $user->id === $quack->duck->id || $user->is_admin === 1;
    }

    /**
     * Determine whether the author can delete the quack.
     *
     * @param  \App\Duck  $user
     * @param  \App\Quack  $quack
     * @return mixed
     */
    public function author_delete(Duck $user, Quack $quack)
    {
        return $user->id === $quack->duck_id || $user->is_admin === 1;
    }

    /**
     * Determine whether the user can restore the quack.
     *
     * @param  \App\Duck  $user
     * @param  \App\Quack  $quack
     * @return mixed
     */
    public function restore(Duck $user, Quack $quack)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the quack.
     *
     * @param  \App\Duck  $user
     * @param  \App\Quack  $quack
     * @return mixed
     */
    public function forceDelete(Duck $user, Quack $quack)
    {
        //
    }

}
