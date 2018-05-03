<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicAccess;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class PublicAccessController extends Controller
{

    /**
     * @author A. A. Sumitro
     * @link https://asmith.my.id
     * @category Create Public Access
     * @param String email
     * @return BladeView
    */

    public function requestView() {

        return view('frontlay/access/request', ['message' => null]);

    }

    public function requestSubmit(Request $request) {

        $rules = array('email'  => 'required|no_spaces|email|unique:public_access,access_email');

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

            $message = $validator->errors()->first('email');
            return view('frontlay/access/request', ['message' => $message]);

        } else {

            $email          = $request->post('email');
            $unique_id      = Controller::generateKey(32);
            $unique_token   = Controller::generateKey(64);
            $ip_address     = $request->ip();
            $group_id       = 3;
            $status         = 1;
            $periode        = time();
            $public_request = PublicAccess::create([
                'access_id'        => $unique_id,
                'access_token'     => $unique_token,
                'access_email'     => $email,
                'ip_address'       => $ip_address,
                'group_id'         => $group_id,
                'access_status'    => $status,
                'access_periode'   => $periode,
            ]);

            if($public_request) {

                $accessAPI = PublicAccess::where('access_email', $email)->first();

                $dataEmail = [
                    'access_email'  => $accessAPI->access_email,
                    'access_id'     => $accessAPI->access_id,
                    'access_token'  => $accessAPI->access_token
                ];

                Mail::send('emails/access/request', $dataEmail, function($message) use ($accessAPI) {
                    $message->to($accessAPI->access_email)->subject('Some App - Public API Access');
                });

                $dataView = ['message' => "Success create account please check your email"];
                return view('frontlay/message/success',  $dataView);

            }

            $dataView = ['message' => "Failed create new access token"];
            return view('errors/400', $dataView);

        }

    }

}
