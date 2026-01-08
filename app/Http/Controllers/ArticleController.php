<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        return view('article.create');
    }

    public function index()
    {
        $articles = Article::with(['category', 'user'])->latest()->paginate(9);
        return view('article.index', compact('articles'));
    }

    public function show(Article $article)
    {
        $article->load(['category', 'user']);
        return view('article.show', compact('article'));
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()
            ->with(['category', 'user'])
            ->latest()
            ->paginate(9);

        return view('article.byCategory', compact('category', 'articles'));
    }
}
