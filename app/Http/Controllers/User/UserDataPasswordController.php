<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User\UsersModel;
use App\Models\User\UsersDetailModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class UserDataPasswordController extends Controller {

    /**
    * Password change view
    *
    * @return void
    */
    public function index(Request $request) {

        $forgot_code = $request->input('code');
        return $this->resetPasswordView($forgot_code, null, null);

    }

    public function passwordForgotAPI(Request $request) {

        $email = $request->input('email');

        $this->validate($request, [
            'email' => 'required|no_spaces|email',
        ]);

        $forgot = UsersModel::where('email', $email)->update([
            'forgotten_password_code' => Controller::generateKey(),
            'forgotten_password_time' => time()
        ]);

        if ($forgot) {

            $user_main = UsersModel::where('email', $email)->first();
            $user_detail = UsersDetailModel::where('user_uid', $user_main->unique_id)->first();

            $data = [
                'name' => $user_detail->name,
                'forgotcode' => $user_main->forgotten_password_code
            ];

            Mail::send('emails/password/reset', $data, function($message) use ($user_main) {
                $message->to($user_main->email)->subject('Some App - Forgot password');
            });

            return response()->json(array(
                'code' => 201,
                'error' => false,
                'message' => 'Reset link has been sent to your email address'
            ),201);

        } else {

            return response()->json(array(
                'code' => 400,
                'error' => true,
                'dev_msg' => 'Bad Request',
                'user_msg' => 'Failed send a email, email not found'
            ),400);

        }

    }

    public function passwordChangeAPI(Request $request) {

        $uuid = $request->input('uuid');
        $passwordOld = $request->post('password_old');
        $passwordNew = $request->post('password_new');

        $user_main = UsersModel::where('unique_id', $uuid)->first();

        $this->validate($request, [
            'password_old' => 'required|no_spaces',
            'password_new' => 'required|no_spaces'
        ]);

        if ($user_main && Hash::check($passwordOld, $user_main->password)) {

            UsersModel::where('unique_id', $uuid)
                    ->update(['password' => password_hash($passwordNew,
                                                            PASSWORD_BCRYPT,
                                                            ['cost' => 10])]);

            return response()->json(array(
                'code' => 201,
                'error' => false,
                'message' => 'Change password success'
            ),201);

        } else {

            return response()->json(array(
                'code' => 400,
                'error' => true,
                'dev_msg' => 'Bad Request',
                'user_msg' => 'Old password not match'
            ),400);

        }

    }

    public function resetPasswordWeb(Request $request) {

        $forgot_code = $request->input('code');
        $passwordNew = $request->post('newPassword');
        $passwordNewConfirm = $request->post('confirmNewPassword');

        $rules = array(
            'newPassword'        => 'required|no_spaces',
            'confirmNewPassword' => 'required|no_spaces|same:newPassword'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $message = "Password not match";
            return $this->resetPwdView($forgot_code, $message, null);
        }

        $message = "Reset password success";
        return $this->resetPasswordView($forgot_code, $message, $passwordNew);

    }

    private function resetPasswordView($forgot_code, $message, $password) {

        if (!$forgot_code) {
            return view('errors/404');
        }

        $user = UsersModel::where('forgotten_password_code', $forgot_code)
                          ->select('forgotten_password_time')
                          ->first();

        if ($user) {

            //code expired 30 mins - 60 x 30 = 1800
            $expiration_time = 1800;
            $code_time = $user->forgotten_password_time;
            if (time() - $code_time > $expiration_time) {

                $data = ['message' => "Forgot code already expired"];
                return view('errors/405', $data);

            }

            if ($password) {
                UsersModel::where('forgotten_password_code', $forgot_code)
                          ->update(['password' => password_hash($password,
                                                                PASSWORD_BCRYPT,
                                                                ['cost' => 10]),
                                    'forgotten_password_code' => null,
                                    'forgotten_password_time' => null
                                    ]);
                $data = ['message' => $message];
                return view('frontlay/message/success', $data);
            }

            $data = ['message' => $message];
            return view('frontlay/password/change', $data);

        } else {

            $data = ['message' => "Forgot code doesn't match"];
            return view('errors/405', $data);

        }

    }

}
