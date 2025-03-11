@extends('layouts.app')

@section('title', $product->name)

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
            @foreach($breadcrumb as $index => $item)
                @if($index < count($breadcrumb) - 1)
                    <li class="breadcrumb-item"><a href="{{ route('category.show', $item['slug']) }}">{{ $item['name'] }}</a></li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
                @endif
            @endforeach
        </ol>
    </nav>

    <div class="row">

        <div class="col-md-6 mb-4">
            @if($product->images->count() > 0)
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($product->images as $index => $image)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100" alt="{{ $product->name }}">
                            </div>
                        @endforeach
                    </div>
                    @if($product->images->count() > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Précédent</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Suivant</span>
                        </button>
                    @endif
                </div>
            @else
                <div class="bg-light p-5 text-center">
                    <p>Aucune image disponible</p>
                </div>
            @endif
        </div>

        <!-- Product Info -->
        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->name }}</h1>
            <p class="fs-3 fw-bold text-primary">{{ number_format($product->price, 2) }} €</p>
            <p class="text-muted">Catégorie: <a href="{{ route('category.show', $product->category->slug) }}">{{ $product->category->name }}</a></p>
            
            <div class="mb-4">
                {!! $product->description !!}
            </div>
            
            <button class="btn btn-success btn-lg">Ajouter au panier</button>
        </div>
    </div>

    <!-- Similar Products -->
    @if($similarProducts->count() > 0)
        <div class="mt-5">
            <h2 class="mb-3">Produits similaires</h2>
            <div class="row">
                @foreach($similarProducts as $similar)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            @if($similar->images->count() > 0)
                                <img src="{{ asset('storage/' . $similar->images->first()->path) }}" class="card-img-top" alt="{{ $similar->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $similar->name }}</h5>
                                <p class="card-text fw-bold">{{ number_format($similar->price, 2) }} €</p>
                                <a href="{{ route('product.show', $similar->slug) }}" class="btn btn-outline-primary">Voir le produit</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection