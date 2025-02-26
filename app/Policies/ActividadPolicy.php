<?php

namespace App\Policies;

use App\Models\Actividad;
use App\Models\Curriculo;
use App\Models\User;

class ActividadPolicy
{

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Curriculo $curriculo): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->esDocente();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Actividad $actividad): bool
    {
        return $user->esPropietario($actividad);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Actividad $actividad): bool
    {
        return $user->esPropietario($actividad);
    }

    /**
     * Determine whether the user can restore the model.
     */
    /*public function restore(User $user, Curriculo $curriculo): bool
    {
        return false;
    }*/

    /**
     * Determine whether the user can permanently delete the model.
     */
    /*public function forceDelete(User $user, Curriculo $curriculo): bool
    {
        return false;
    }*/
}
