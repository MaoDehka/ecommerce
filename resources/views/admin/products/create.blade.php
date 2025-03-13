@extends('admin.layouts.app')

@section('title', isset($product) ? 'Modifier le produit' : 'Créer un produit')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ isset($product) ? 'Modifier' : 'Créer' }} un produit</h1>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Retour</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ isset($product) ? route('admin.products.update', $product) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Catégorie</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                        <option value="">Sélectionner une catégorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ old('description', $product->description ?? '') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prix (€)</label>
                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price ?? '') }}" required>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="active" class="form-label">Actif</label>
                    <select class="form-control @error('active') is-invalid @enderror" id="active" name="active">
                        <option value="1" {{ old('active', $product->active ?? 1) == 1 ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ old('active', $product->active ?? 1) == 0 ? 'selected' : '' }}>Non</option>
                    </select>
                    @error('active')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="images" class="form-label">Images</label>
                    <input type="file" class="form-control @error('images') is-invalid @enderror" id="images" name="images[]" multiple>
                    @error('images')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @if(isset($product) && $product->images->count() > 0)
                    <div class="mb-3">
                        <label class="form-label">Images actuelles</label>
                        <div class="d-flex">
                            @foreach($product->images as $image)
                                <div class="me-2">
                                    <img src="{{ asset('storage/' . $image->path) }}" alt="Image produit" class="img-thumbnail" width="100">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection
