<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\product;
use App\Policies\CategoryPolicy;
use App\Policies\ProductPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        product::class=>ProductPolicy::class,
        Category::class=>CategoryPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //$user is the currently logged in user and $product is the currrently ready to edit product
        // Gate::define('update-product',function (User $user,Product $product){
        //     return $product->user_id == $user->id;  //returns true if the condition is trure and allows user for edit
        // });
        Gate::define('delete-product',function(User $user,Product $product){
            if($user->user_type == 'admin'){
                return true;
            }
            return $product->user_id == $user->id;
        });
    }
}
