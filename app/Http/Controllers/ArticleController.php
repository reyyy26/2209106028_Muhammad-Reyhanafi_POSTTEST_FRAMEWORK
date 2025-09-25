<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $perPage = 6;

        $query = Article::with(['category', 'tags'])->whereNotNull('published_at');

        if (!empty($q)) {
            $query->where(function($sub) use ($q){
                $sub->where('title', 'like', "%{$q}%")
                    ->orWhere('excerpt', 'like', "%{$q}%")
                    ->orWhere('content', 'like', "%{$q}%");
            });
        }

        $articles = $query->orderBy('published_at', 'desc')->paginate($perPage)->withQueryString();

        return view('articles.index', compact('articles','q'));
    }

    public function show(Article $article)
    {
        $article->load(['category', 'tags']); // eager load biar aman
        return view('articles.show', compact('article'));
    }
}
