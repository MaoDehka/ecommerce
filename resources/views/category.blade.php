@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <!-- Breadcrumb -->
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

    <h1 class="mb-4">{{ $category->name }}</h1>
    
    @if($category->description)
        <div class="mb-4">
            {!! $category->description !!}
        </div>
    @endif

    <!-- Child Categories -->
    @if($childCategories->count() > 0)
        <h2 class="mb-3">Sous-catégories</h2>
        <div class="row mb-4">
            @foreach($childCategories as $childCategory)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $childCategory->name }}</h5>
                            <a href="{{ route('category.show', $childCategory->slug) }}" class="btn btn-outline-primary">Voir</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Products -->
    <h2 class="mb-3">Produits</h2>
    @if($products->count() > 0)
        <div class="row">
            @foreach($products as $product)
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
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    @else
        <p>Aucun produit disponible dans cette catégorie pour le moment.</p>
    @endif
@endsection