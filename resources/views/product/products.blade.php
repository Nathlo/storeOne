@extends('layouts.store')


@section('content')
    
<ul class="ml-10 flex flex-1 gap-4">
        <h2>CATÉGORIES</h2>
        @foreach ($categories as $category )
            <li class="bg-slate-300 p-1 rounded">
                <a href="{{route('product.category', $category->id)}}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ul>

<x-product-card :products="$products"/>


<!-- liens de pagiation -->
{{ $products->links()  }}

@endsection