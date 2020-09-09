<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Auth;
use App\Models\Article\Article;
use App\Events\{CreatedArticle, UpdatedArticle, CreatedArticleForEditor};

class ArticleController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $data = [];

        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['required']
        ]);

        $article = auth()->user()->articles()->create([
            'user_id' => auth()->user()->id,
            'title' => request('title'),
            'body' => request('body')
        ]);

        $data['article'] = $article;

        $user = auth()->user();

        event(new CreatedArticleForEditor($user, $article)); 
        event(new CreatedArticle($user, $article));

        return response()->json([
            'response_code' => '00',
            'response_message' => 'Successfully created Article/Blog.',
            'data' => $data
        ], 200);
    }

    public function changePublishStatus($id) {
        $article = Article::find($id);
        if($article->publish_status == 0) {
            $article->publish_status = 1;
            $article->save();
        }

        // dd($article->publish_status);

        $user = auth()->user();

        event(new UpdatedArticle($user, $article));

        return response()->json('Article was published. :)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
