@extends('layout.app')
@section('content')


{{-- grille de produits mobile 1 produit par ranger tablette 2 produit par ranger ordinateur 4 par ranger responsive --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
    
    @forelse ($products as $product)
    
   
    <x-card-product :product="$product"/>
        
    @empty
        il n'y a pas de produit en base de donnée
    @endforelse
    
</div>
    
@endsection