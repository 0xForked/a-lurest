<?php

namespace App\Http\Controllers\AsmitWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AsmitWeb\ProjectModel as Project;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    public function showList(Request $request) {
        $limit      = $request->get('limit');
        $message    = Project::limit($limit)->get();
        if (isset($message)) {
            return response()->json($message, 200);
        }
    }

    public function showDetail(Request $request) {
        $project_slug = $request->get('slug');
        $rules = array('slug'  => 'required');
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->first('slug');
            return response(array(
                'code'     => 400,
                'error'    => "true",
                'dev_msg'  => 'Bad Request',
                'user_msg' =>  $errors
            ));
        } else {
            $project = Project::where('awp_slug', $project_slug)->first();
            if (isset($project)) {
                $project_detail = array(
                    'code'     => 200,
                    'error'    => "false",
                    'message'  => 'Success',
                    'result'   => [
                        'project_id'            => $project->id,
                        'project_author_id'     => $project->awp_author_id,
                        'project_slug'          => $project->awp_slug,
                        'project_category'      => $project->awp_category,
                        'project_tag'           => $project->awp_tags,
                        'project_title'         => $project->awp_title,
                        'project_description'   => $project->awp_description,
                        'project_headline'      => $project->awp_headline,
                        'project_status'        => $project->awp_status,
                        'project_link_android'  => $project->awp_link_android,
                        'project_link_osx'      => $project->awp_link_osx,
                        'project_link_web'      => $project->awp_link_web,
                        'project_link_web_demo' => $project->awp_link_web_demo,
                        'project_link_github'   => $project->awp_link_github,
                        'project_link_guide'    => $project->awp_link_guide,
                        'project_logo'          => $project->awp_logo,
                        'created_at'            => $project->created_at
                    ]
                );
                return response()->json($project_detail, 200);
            }
            return response(array(
                'code'     => 204,
                'error'    => "true",
                'dev_msg'  => 'No Content',
                'user_msg' => 'No Message Found'
            ), 204);
        }
    }

    public function createProject() {

    }

    public function updateProject() {

    }

    public function deleteProject() {

    }

}
