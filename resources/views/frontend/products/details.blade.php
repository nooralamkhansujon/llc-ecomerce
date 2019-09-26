@extends('frontend.layouts.master')


@section('main-content')

<div class="container mt-2">
 
  <p class="text-center">{{ $product->title }}</p>
<div class="card" >
    <div class="row">
    <div class="col-md-4">
          <img  class="card-img-top" src="{{ asset('storage/'.$product->getMedia('products')[0]->id.'/'.$product->getMedia('products')[0]->file_name) }}" alt="{{ $product->title }}"> 
    </div>

    <div class="col-md-8">
      <div class="card-body">
          <h5 class="card-title">{{ $product->title }}</h5>
            <dl class="item-property">
               <dt>Description</dt>
               <dd><p>{{ $product->description  }}</p></dd>
            </dl>
      </div>

      <div class="card-footer mt-5 d-flex justify-content-between">
             <form action="{{route('cart.add')}}" 
             method="POST" >
                  @csrf 
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <button type="submit" class="btn btn-sm btn-outline-secondary">
                  <i class="fa fa-shopping-cart"></i>
                   Add to Cart
                  </button>
            </form>
        <p>
          <strong class="text-muted">
                  @if($product->sale_price || $product->sale_price > 0)
                     BDT <strike class="text-danger">
                     {{ $product->price }}</strike>  {{ $product->sale_price }}
                  @else 
                      {{ $product->price }}
                  @endif 
               
            </strong>
        </p>
       
    </div>
  </div>

</div>

</div>



@endsection 