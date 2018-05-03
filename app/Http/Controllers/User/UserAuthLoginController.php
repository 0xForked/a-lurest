<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\UsersModel;
use Illuminate\Http\Request;

class UserAuthLoginController extends Controller {

    /**
     * @author A. A. Sumitro
     * @link https://asmith.my.id
     * @category User auth - login
     * @param String email, password
     * @return JSONdata
    */
    public function index(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|no_spaces'
        ]);

        $email = $request->post('email');
        $password = $request->post('password');

        $user = UsersModel::where('email', $email)->first();

        if (!$user){
            return response()->json(array(
                'code' => 400,
                'error' => true,
                'dev_msg' => 'Bad Request',
                'user_msg' => 'Login failed, Email address not found',
            ),400);
        }

        if (password_verify($password, $user->password)) {

            $unique_token = Controller::generateKey(64);

            $tokens = UsersModel::where('email', $email)->update(
                ['unique_token' => $unique_token]
            );

            if ($tokens) {

                $user_main = UsersModel::where('email', $email)->first();

                return response()->json(array(
                    'code'     => 200,
                    'error'    => false,
                    'message'  => 'Login Success',
                    'result'   => [
                        'access_token' => $user_main->unique_token,
                        'unique_id'    => $user_main->unique_id,
                        'status_acc'   => $user_main->status_acc
                    ]
                ),200);

            }
        }

        return response()->json(array(
            'code' => 400,
            'error' => true,
            'dev_msg' => 'Bad Request',
            'user_msg' => 'Login failed, Wrong password',
        ),400);
    }

}
