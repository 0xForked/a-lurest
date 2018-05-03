<?php

namespace App\Http\Controllers\asmitweb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AsmitWeb\ArticleCategoryModel as Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{

    public function showList(Request $request) {
        $limit      = $request->get('limit');
        $category   = Category::limit($limit)->get();
        if (isset($category)) {
            return response()->json($category, 200);
        }
    }

    public function showDetail(Request $request) {
        $catg_id = $request->get('id');
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
            $category = Category::where('id', $catg_id)->first();
            if (isset($category)) {
                $category_detail = array(
                    'code'     => 200,
                    'error'    => "false",
                    'message'  => 'Success',
                    'result'   => [
                        'catg_id'           => $category->id,
                        'catg_slug'         => $category->awac_slug,
                        'catg_title'        => $category->awac_title,
                        'catg_description'  => $category->awac_description,
                        'catg_count'        => $category->awac_count
                    ]
                );
                return response()->json($category_detail, 200);
            }
            return response(array(
                'code'     => 204,
                'error'    => "true",
                'dev_msg'  => 'No Content',
                'user_msg' => 'No Category Found'
            ), 204);
        }
    }

    public function createCategory() {

    }

    public function updateCategory() {

    }

    public function deleteCategory() {

    }

}
