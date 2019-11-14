<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Load Article index page.
     * main view of article.
     */
    public function index()
    {
        return view('article.index');
    }//.... end of index() .....//

    public function getArticlesList()
    {
       return DataTables::of(Article::query())
           ->addColumn('action', function ($article) {
             return '';
           })->make(true);
    }

    /**
     * @param Request $request
     * @return array
     * Delete specific article.
     */
    public function deleteArticle(Request $request)
    {
        Article::destroy($request->id);
        return ['status' => true, 'message' => 'Article deleted successfully'];
    }
}
