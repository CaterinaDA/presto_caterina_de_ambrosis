<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;



class RevisorController extends Controller
{
    public function index()
    {
        $article_to_check = Article::whereNull('is_accepted')
            ->with(['category', 'user', 'images'])
            ->orderBy('created_at', 'asc')
            ->first();

        return view('revisor.index', compact('article_to_check'));
    }

    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()->with('message', 'Articolo accettato');
    }

    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('message', 'Articolo rifiutato');
    }

    public function becomeRevisor(Request $request)
    {
        Mail::to('admin@presto.it')->send(
            new BecomeRevisor($request->user())
        );

        return redirect()->back()->with('message', 'Richiesta inviata con successo!');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', [
            'email' => $user->email
        ]);

        return redirect()->route('home')->with('message', 'Utente promosso a revisore!');
    }
}
