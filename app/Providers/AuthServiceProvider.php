<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //category
        Gate::define('category_list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.category_list'));
        });
        Gate::define('category_add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.category_add'));
        });
        Gate::define('category_edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.category_edit'));
        });
        Gate::define('category_delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.category_delete'));
        });
        //product
        Gate::define('product_list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.product_list'));
        });
        Gate::define('product_add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.product_add'));
        });
        Gate::define('product_edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.product_edit'));
        });
        Gate::define('product_delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.product_delete'));
        });
        //coupon
        Gate::define('coupon_list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.coupon_list'));
        });
        Gate::define('coupon_add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.coupon_add'));
        });
        Gate::define('coupon_edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.coupon_edit'));
        });
        Gate::define('coupon_delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.coupon_delete'));

        });
        //phi_ship
        Gate::define('phi_ship_list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.phi_ship_list'));
        });
        Gate::define('phi_ship_add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.phi_ship_add'));
        });
        Gate::define('phi_ship_edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.phi_ship_edit'));
        });
        Gate::define('phi_ship_delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.phi_ship_delete'));

        });
        //user
        Gate::define('user_list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.user_list'));
        });
        Gate::define('user_add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.user_add'));
        });
        Gate::define('user_edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.user_edit'));
        });
        Gate::define('user_delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.user_delete'));
        });
        //roles
        Gate::define('role_list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.role_list'));
        });
        Gate::define('role_add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.role_add'));
        });
        Gate::define('role_edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.role_edit'));
        });
        Gate::define('role_delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.role_delete'));
        });
        //permission
        Gate::define('permission_list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.permission_list'));
        });
        Gate::define('permission_add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.permission_add'));
        });
        Gate::define('permission_edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.permission_edit'));
        });
        Gate::define('permission_delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.permission_delete'));
        });
        //slider
        Gate::define('slider_list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.slider_list'));
        });
        Gate::define('slider_add', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.slider_add'));
        });
        Gate::define('slider_edit', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.slider_edit'));
        });
        Gate::define('slider_delete', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.slider_delete'));
        });
        //comment
        Gate::define('comment_list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.comment_list'));
        });
         Gate::define('oder_list', function ($user) {
            return $user->checkPermissionAccess(config('permissions.access.oder_list'));
        });


    }

}
