<?php

namespace App\Livewire;

use App\Models\Article;
use App\Jobs\ResizeImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    public $temporary_images = [];
    public $images = [];

    #[Validate('required|min:3')]
    public $title = '';

    #[Validate('required|min:10')]
    public $description = '';

    #[Validate('required|numeric|min:1')]
    public $price = '';

    #[Validate('required|exists:categories,id')]
    public $category_id = '';


    public function updatedTemporaryImages()
    {
        $this->validate([
            'temporary_images.*' => 'image|max:2048',
        ]);

        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
    }

    public function removeImage($key)
    {
        unset($this->images[$key]);
        $this->images = array_values($this->images);
    }

    public function store()
    {
        $this->validate();

        $article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => Auth::id(),
        ]);

        foreach ($this->images as $image) {
            $path = $image->store('articles', 'public');

            $article->images()->create([
                'path' => $path,
            ]);

            ResizeImage::dispatch(300, 300, $path);
        }

        $this->temporary_images = [];

        session()->flash('success', 'Annuncio inserito correttamente');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
