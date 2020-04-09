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
            'articles' => Article::latest()->paginate(6)
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

        $slug = Str::slug(request('title'), '-');
        $path = $request->file('article_cover')->store('posts/images', 'public');

        $validatedAttributes = request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);


        $validatedAttributes['image_path'] = $path;
        $validatedAttributes['slug'] = $slug;


        // Save the article
        $article = auth()->user()->articles()->create($validatedAttributes);

        Mail::to('suleiman665@gmail.com')->send(new PostAwaitingApproval($article));


        return redirect(route('articles'));
    }

    public function saveComment(Request $request, Article $article)
    {
        $articleId = $article->id;
        $validatedComment = request()->validate([
            'body' => 'required',
        ]);

        $validatedComment['article_id'] = $articleId;

        auth()->user()->comments()->create($validatedComment);

        return back();
    }
}
