@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <h1 class="mb-4">Bienvenue sur notre boutique</h1>

    <h2 class="mb-3">Produits mis en avant</h2>
    <div class="row">
        @foreach($featuredProducts as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($product->images->count() > 0)
                        <img src="{{ asset('storage/' . $product->images->first()->path) }}" class="card-img-top" alt="{{ $product->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($product->description), 100) }}</p>
                        <p class="card-text fw-bold">{{ number_format($product->price, 2) }} €</p>
                        <a href="{{ route('product.show', $product->slug) }}" class="btn btn-primary">Voir le produit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection