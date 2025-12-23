<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    #[Validate('required|min:3')]
    public $title = '';

    #[Validate('required|min:10')]
    public $description = '';

    #[Validate('required|numeric|min:1')]
    public $price = '';

    #[Validate('required|exists:categories,id')]
    public $category_id = '';


    public function store()
    {
        $this->validate();

        Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'Annuncio inserito correttamente');

        $this->reset();
    }











    public function render()
    {
        return view('livewire.create-article-form');
    }
}
