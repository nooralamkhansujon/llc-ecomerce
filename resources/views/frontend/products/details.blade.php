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
        <a  href="#" class="btn btn-outline-primary btn-lg">
           Add To Cart
        </a>
        <p>
          <span class="currency">BDT </span>
          <strong class="num">{{ $product->price }}</strong>
        </p>
       
    </div>
  </div>

</div>

</div>



@endsection 