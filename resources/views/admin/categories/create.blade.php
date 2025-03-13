@extends('admin.layouts.app')

@section('title', 'Créer une catégorie')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Créer une catégorie</h1>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Retour</a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="parent_id" class="form-label">Catégorie parente</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="">Aucune (catégorie principale)</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
        </div>
    </div>
@endsection