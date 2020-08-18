<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $articles = \App\Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('article.index', ["articles" => $articles]);
    }
    
    public function create()
    {
        return view('article.create', [
            "tags" => \App\Tag::all()
        ]);
    }

    public function store(Request $request, Article $article)
    {
        $this->validateArticle();
        $data['title'] = $request['title']; 
        $data['excerpt'] = Str::limit($request['body']);
        $data['body'] = $request['body'];

        $article = new Article($data);
        $article->user_id = 1;
        $article->save();
        
        if (request('tags')) {
            $article->tags()->attach(request('tags'));
        }
        // $article->create($this->validateArticle());
        return redirect('/articles');
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->update($this->validateArticle());
        return redirect($article->path());
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/articles');
    }

    public function validateArticle()
    {
        return request()->validate([
            'title' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}
