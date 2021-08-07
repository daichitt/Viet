<?php

namespace App\Http\Controllers;

use App\models\Article;
use Illuminate\Http\Request;

use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{

    //==========ここから追加========== 
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }
    //==========ここまで追加========== 

    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');
        return view('articles.index', ['articles' => $articles]);
    }

    //==========ここから追加========== 
    public function create()
    {
        return view('articles.create');    
    }
    //==========ここまで追加==========


    //==========ここから追加========== 
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);    
    }
    //==========ここまで追加==========

    //==========ここから追加==========
    public function store(ArticleRequest $request, Article $article)
    {
        // $article->title = $request->title;
        // $article->body = $request->body;
        $article->fill($request->all()); //-- この行を追加
        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('articles.index');
    }
    //==========ここまで追加==========


    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        return redirect()->route('articles.index');
    }
    
    //==========ここから追加==========
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
    //==========ここまで追加==========


    //-- ここから追加
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }    
    //-- ここまで追加
}
