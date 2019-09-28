@extends('frontend.layouts.master')

  @section('main-content')
    
 @include('frontend.partials.hero');

  <div class="album py-5 bg-light">
    <div class="container">

    <!--This is will show message  -->
  <div class="container text-light">
    <div class="row">
      <div class="col-md-12">
          @include('frontend.partials.message')
      </div>
    </div>
  </div>
  <!-- end of message -->

<div class="row">
@foreach($products as $product)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
      <a href="{{route('product.details',$product->slug)}}">
        <img src="{{ asset('storage/'.$product->getMedia('products')[0]->id.'/'.$product->getMedia('products')[0]->file_name) }}" class="card-img-top" alt="{{ $product->title }}" />
      </a>

    <div class="card-body">

      <p class="card-text">
      <a 
        href="{{route('product.details',$product->slug)}}">
          {{ $product->title }}
      </a>
    
      </p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">

          <form action="{{route('cart.add')}}" method="POST" >
              @csrf 
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <button type="submit" class="btn btn-sm btn-outline-secondary">
              <i class="fa fa-shopping-cart"></i> Add to Cart
              </button>
          </form>
        
        </div>
        <strong class="text-muted">
          @if($product->sale_price || $product->sale_price > 0)
              BDT <strike class="text-danger">{{ $product->price }}</strike>  {{ $product->sale_price }}
          @else 
              BDT {{ $product->price }}
          @endif 
        
        </strong>
      </div>
    </div>
  </div>
</div>
@endforeach 

      </div>       
      
      <div class="d-flex justify-content-center">
           {{$products->render()}}
      </div>
     
      
    </div>
  </div>


  @endsection 