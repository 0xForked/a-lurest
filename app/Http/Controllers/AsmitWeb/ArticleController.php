<?php

namespace App\Http\Controllers\AsmitWeb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AsmitWeb\ArticleModel as Article;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{

    public function showList(Request $request) {
        $limit      = $request->get('limit');
        $article   = Article::limit($limit)->get();
        if (isset($article)) {
            return response()->json($article, 200);
        }
        return respose()->json(array());
    }

    public function showDetail(Request $request) {
        $article_slug = $request->get('slug');
        $rules      = array('slug'  => 'required');
        $validator  = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->first('slug');
            return response(array(
                'code'     => 400,
                'error'    => "true",
                'dev_msg'  => 'Bad Request',
                'user_msg' =>  $errors
            ));
        } else {
            $article = Article::where('awa_slug', $article_slug)->first();
            if (isset($article)) {
                $article_detail = array(
                    'code'     => 200,
                    'error'    => "false",
                    'message'  => 'Success',
                    'result'   => [
                        'article_id'            => $article->id,
                        'article_author_id'     => $article->awa_author_id,
                        'article_category'      => $article->awa_category,
                        'article_tags'          => $article->awa_tags,
                        'article_slug'          => $article->awa_slug,
                        'article_title'         => $article->awa_title,
                        'article_content'       => $article->awa_content,
                        'article_image'         => $article->awa_image,
                        'article_published'     => $article->awa_published,
                        'article_headline'      => $article->awa_headline,
                        'article_love_count'    => $article->awa_love_count,
                        'created_at '           => $article->created_at
                    ]
                );
                return response()->json($article_detail, 200);
            }
            return response(array(
                'code'     => 204,
                'error'    => "true",
                'dev_msg'  => 'No Content',
                'user_msg' => 'No Article Found'
            ), 204);
        }
    }

    public function createArticle() {

    }

    public function updateArticle() {

    }

    public function deleteArticle() {

    }

}
