<?php

namespace App\Http\Controllers\AsmitWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AsmitWeb\ContactModel as Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class MessageController extends Controller
{

    public function showList(Request $request) {
        $limit      = $request->get('limit');
        $message    = Message::limit($limit)->get();
        if (isset($message)) {
            return response()->json($message, 200);
        }
    }

    public function showDetail(Request $request) {
        $message_id = $request->get('id');
        $rules = array('id'  => 'required');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->first('id');
            return response(array(
                'code'     => 400,
                'error'    => "true",
                'dev_msg'  => 'Bad Request',
                'user_msg' =>  $errors
            ));
        } else {
            $message = Message::where('id', $message_id)->first();
            if (isset($message)) {
                $message_detail = array(
                    'code'     => 200,
                    'error'    => "false",
                    'message'  => 'Success',
                    'result'   => [
                        'msg_id'            => $message->id,
                        'msg_sender_name'   => $message->awm_sender_name,
                        'msg_sender_email'  => $message->awm_sender_email,
                        'msg_title'         => $message->awm_message_title,
                        'msg_body'          => $message->awm_message_body,
                        'msg_status'        => $message->awm_message_status,
                        'created_at'        => $message->created_at
                    ]
                );
                return response()->json($message_detail, 200);
            }
            return response(array(
                'code'     => 204,
                'error'    => "true",
                'dev_msg'  => 'No Content',
                'user_msg' => 'No Message Found'
            ), 204);
        }
    }

    public function createMessage() {

    }

    public function updateMessage() {

    }

    public function deleteMessage() {

    }

}
