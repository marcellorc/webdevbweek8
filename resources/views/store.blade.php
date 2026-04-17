@extends('base.base')
@if(session('success'))
   <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-4 shadow" style="z-index: 1050;" role="alert">
      <strong>Success!</strong> {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
@endif
@section('content')
    <h1>Store Page</h1>
    <a href="{{ route('product.insert-form') }}" class="btn btn-primary">Insert New Product</a>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($products as $product)
        <div class="col">
            <div class="card">
                <img src="{{ $product->image_path ? asset('product_image/' . $product->image_path) : 'https://placehold.co/200x200?text=No+Image' }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; height: 200px;">
                <div class="card-body">
                    <h5 class="card-title"> {{ $product->name }}</h5>
                    <p class="card-text"><i>{{ $product->product_category->name }}</i></p>
                    <p class="card-text">Rp {{ number_format($product->price, 2) }}</p>
                    <p class="card-text">{{ $product->details }}</p>
                    <a href ="{{ route('product_edit_form', $product->id) }}" class="btn btn-warning">Edit Product</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection