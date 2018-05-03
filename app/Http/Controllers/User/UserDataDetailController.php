<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\UsersModel;
use App\Models\User\UsersDetailModel;
use App\Models\User\GroupModel;
use Illuminate\Http\Request;
use Spatie\ArrayToXml\ArrayToXml;

class UserDataDetailController extends Controller {

    /**
     * @author A. A. Sumitro
     * @link https://asmith.my.id
     * @category User data - detail
     * @param String uuid
     * @param Token
     * @return JSONdata
    */
    public function index(Request $request) {

        $type = $request->header('Content-Type');
        $uuid = $request->input('uuid');

        $user = UsersModel::where('unique_id', $uuid)
                          ->first();

        if (isset($user)) {

            $user_detail = UsersDetailModel::where('user_uid', $user->unique_id)->first();
            $groups = GroupModel::where('id', $user_detail->group_id)->first();

            $user_data = array(
                'code'     => 200,
                'error'    => "false",
                'message'  => 'Success',
                'result'   => [
                    'access_token'  => $user->unique_token,
                    'user_id'       => $user->unique_id,
                    'username'      => "@".$user->username,
                    'phone'         => $user->phone,
                    'email'         => $user->email,
                    'fullname'      => $user_detail->name,
                    'group'         => $groups->name,
                ]
            );

            if ($type == 'application/xml') {
                return ArrayToXml::convert($user_data);
            }

            return response()->json($user_data, 200);

        } else {
            return response()->json(array(
                'status' => 400,
                'error' => true,
                'dev_msg' => 'Bad Request',
                'user_msg' => 'Invalid user unique id or user unique token'
            ),400);
        }
    }
}
