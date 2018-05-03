<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\UsersModel;
use App\Models\User\UsersDetailModel;
use App\Models\User\GroupModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserAuthRegisterController extends Controller {

    /**
     * @author A. A. Sumitro
     * @link https://asmith.my.id
     * @category User auth - register
     * @param String fullname, phone, username, email, password
     * @return JSONData
    */
    public function index(Request $request) {

        $this->validate($request, [
            'fullname'      => 'required|alpha_spaces',
            'username'      => 'required|alpha_num|unique:users,username',
            'phone'         => 'required|phone_number',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|no_spaces'
        ]);

        $fullname       = $request->post('fullname');
        $username       = $request->post('username');
        $phone          = $request->post('phone');
        $email          = $request->post('email');
        $password       = $request->post('password');
        $unique_id      = Controller::generateKey(32);
        $unique_token   = Controller::generateKey(64);
        $default_group  = 3;
        $account_status = 1;

        $register = UsersModel::create([
            'unique_id'     => $unique_id,
            'unique_token'  => $unique_token,
            'email'         => $email,
            'username'      => $username,
            'phone'         => $phone,
            'password'      => password_hash($password,
                               PASSWORD_BCRYPT, ['cost' => 10]),
            'status_acc'   => $account_status,
        ]);

        if ($register) {
            $user = UsersModel::where('email', $email)->first();

            UsersDetailModel::create([
                'user_uid'    => $user->unique_id,
                'group_id'    => $default_group,
                'name'        => $fullname,
            ]);

            $user_detail = UsersDetailModel::where('user_uid', $user->unique_id)->first();
            $groups = GroupModel::where('id', $user_detail->group_id)->first();

            $data = [
                'name' => $user_detail->name
            ];

            Mail::send('emails/welcome', $data, function($message) use ($user) {
                $message->to($user->email)->subject('Welcome to Some App');
            });
        }

        return response()->json(array(
            'code'     => 201,
            'error'    => false,
            'message'  => 'success created new user',
            'result'   => [
                'access_token'  => $user->unique_token,
                'user_id'       => $user->unique_id,
                'status_acc'    => $user->status_acc,
                'user_group'    => $groups->name,
            ]
        ),201);

    }

}
