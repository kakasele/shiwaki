<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Article;
use App\Mail\PostAwaitingApproval;
use Illuminate\Support\Facades\Mail;

class ArticlesController extends Controller
{
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::where('status', 1)->paginate(6)
        ]);
    }

    public function show(Article $article)
    {


        return view(
            'articles.show',
            [
                'article' => $article,
                'user_articles' => Article::where('user_id', $article->user_id)->latest()->get()
            ]

        );
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);


        $attributes['image_path'] = $request->file('article_cover')->store('posts/images', 'public');
        $attributes['slug'] = Str::slug(request('title'), '-');


        auth()->user()->articles()->create($attributes);

        // Mail::to('suleiman665@gmail.com')->send(new PostAwaitingApproval($article));


        return redirect(route('articles'));
    }
}
