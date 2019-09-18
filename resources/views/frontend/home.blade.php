@extends('frontend.layouts.master')

  @section('main-content')
    
 @include('frontend.partials.hero');

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">


      @foreach($products as $product)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
             <img src="{{ asset('storage/'.$product->getMedia('products')[0]->id.'/'.$product->getMedia('products')[0]->file_name) }}" class="card-img-top" alt="{{ $product->title }}" />
            <div class="card-body">

              <p class="card-text">
              {{ $product->title }}
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                </div>
                <strong class="text-muted">BDT {{ $product->price }}</strong>
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