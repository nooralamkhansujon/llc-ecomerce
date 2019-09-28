@extends('frontend.layouts.master')


@section('main-content') 

<div class="container">
     
     <div class="container">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif 

        <br>
        <p class="text-center">Order Details</p>
        <hr>
     </div>

     <div class="container">
        <h3>Order ID: {{ $order->id }}</h3>

        <ul class="list-group">
        @foreach($order->toArray() as $column => $value)

           @if(is_string($value))
                @if($column == 'id' || $column == 'user_id')
                   @continue 
                @endif
                <li class="list-group-item">
                  {{ ucwords(str_replace('_',' ',$column)) }} : {{ $value }}
                </li>
            @endif 

        @endforeach 
          
       </ul> 
       <hr>

       <h3>Ordered Products: {{ $order->id }}</h3>
       
       <table class="table table-bordered table-hover">
             
           <thead>
                <tr>
                    <td>Product Title</td>
                    <td>Quantity</td>
                    <td>Total Price</td>
                </tr>
           </thead>
         
                @foreach($order->products as $product)
                  <tr>
                    <td>{{ $product->product->title }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->price,2) }}</td>
                  </tr>
                @endforeach 

          
        



       </table>
     </div>
</div>

@endsection 