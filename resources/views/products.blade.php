@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <h1>Ini di halaman Produk</h1>
        </div>
    </div>
</div>

@if ($products->count())
    <div class="card mb-3">
      <div class="card-body text-center">
        <h3 class="card-title"><a href="/products/{{ $products[0]->id }}" class="text-decoration-none text-dark">{{ $products[0]->nama }} 
        <p>
          Harga: {{ $products[0]->harga }} <br>
          Stok: {{ $products[0]->stok }}
        </p></a></h3>
      </div>
    </div>

  <div class="container">
      <div class="row">
        @foreach ($products->skip(1) as $product)
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ $product->nama }}</h5>
                Harga: {{ $product->harga }} <br>
                Stok: {{ $product->stok }}
                <p>
                  <small class="text-muted">
                    Di upload: {{ $product->created_at->diffForHumans() }}
                  </small>
                </p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
  </div>

  @else
    <p class="text-center fs-4">No product found.</p>
  @endif
{{-- 
  <div class="d-flex justify-content-end">
    {{ $products->links() }}
  </div> --}}

@endsection
