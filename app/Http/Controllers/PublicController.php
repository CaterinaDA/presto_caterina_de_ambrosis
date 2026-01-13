<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::where('is_accepted', true)
            ->with(['category', 'user', 'images'])
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('articles'));
    }

    public function searchArticles(Request $request)
    {
        $query = $request->input('query');

        $articles = Article::search($query)
            ->where('is_accepted', true)
            ->paginate(10);

        return view('article.searched', compact('articles', 'query'));
    }

    public function setLanguage($lang)
    {
        session(['locale' => $lang]);
        return redirect()->back();
    }
}
