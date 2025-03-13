@extends('admin.layouts.app')

@section('title', 'Gestion des produits')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestion des produits</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Nouveau produit</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Actif</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 2) }} €</td>
                            <td>{{ $product->category ? $product->category->name : '-' }}</td>
                            <td>{{ $product->active ? 'Oui' : 'Non' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning me-2">Modifier</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection