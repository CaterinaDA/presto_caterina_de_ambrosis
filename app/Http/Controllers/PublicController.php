<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::where('is_accepted', true)
            ->with(['category', 'user'])
            ->latest()
            ->take(6)
            ->get();

        return view('welcome', compact('articles'));
    }
}
