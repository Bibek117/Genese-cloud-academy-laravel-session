<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Category;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function create(User $user){
        if($user->user_type == 'admin'){
            return true;
        }
    }
    public function update(User $user){
        if($user->user_type == 'admin'){
            return true;
        }
    }
}
