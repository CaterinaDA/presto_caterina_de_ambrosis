@if (session('success'))
    <div class="alert alert-success mb-3">
        {{ session('success') }}
    </div>
@endif

<form wire:submit.prevent="store" class="card p-4 shadow-sm">

    <div class="mb-3">
        <label class="form-label">Titolo</label>
        <input type="text" class="form-control" wire:model.blur="title">
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Descrizione</label>
        <textarea class="form-control" rows="4" wire:model.blur="description"></textarea>
        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Prezzo (€)</label>
        <input type="number" step="0.01" class="form-control" wire:model.blur="price">
        @error('price')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select class="form-select" wire:model="category_id">
            <option value="">Seleziona categoria</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    {{-- Upload immagini multiple --}}
    <div class="mb-3">
        <label class="form-label">Immagini</label>

        <input type="file" class="form-control" wire:model="temporary_images" multiple>

        @error('temporary_images.*')
            <small class="text-danger">{{ $message }}</small>
        @enderror

        <div wire:loading wire:target="temporary_images" class="small text-muted mt-2">
            Caricamento immagini...
        </div>
    </div>

    {{-- Preview + rimozione --}}
    @if (!empty($images))
        <div class="row mt-3">
            @foreach ($images as $key => $image)
                <div class="col-12 col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded-top" alt="preview">

                        <div class="card-body text-center">
                            <button type="button" class="btn btn-danger btn-sm"
                                wire:click="removeImage({{ $key }})">
                                Rimuovi
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <button class="btn btn-warning fw-semibold">
        Inserisci annuncio
    </button>

</form>
