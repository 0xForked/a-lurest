<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use App\Models\User\UsersModel;

class Authenticate {
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth) {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if ($this->auth->guard($guard)->guest()) {
            if ($request->has('token')) {
                $token = $request->input('token');
                $check_token = UsersModel::where('unique_token', $token)->first();
                if ($check_token == null) {
                    return response()->json(array(
                        'code'     => 405,
                        'error'    => false,
                        'dev_msg'  => 'Permission not allowed',
                        'user_msg' => 'Invalid access token'
                    ),405);
                }
            } else {
                return response()->json(array(
                    'code'     => 401,
                    'error'    => true,
                    'dev_msg'  => 'Unauthorized',
                    'user_msg' => 'Access token require'
                ),401);
            }
        }

        return $next($request);

    }
}
