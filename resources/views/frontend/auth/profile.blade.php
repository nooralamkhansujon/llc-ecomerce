@extends('frontend.layouts.master')

@section('main-content') 
      
      <div class="container">
         <br>
         <p class="text-center">My Profile</p>
         <hr>
      </div>
      
      <div class="container">
         <h3></h3>
         <table class="table table-bordered table-hover">
            <thead>
               <tr>
                 <td>Order ID</td>
                 <td>Customer Name</td>
                 <td>Customer Phone Number</td>
                 <td>Total Amount</td>
                 <td>Paid Amount</td>
                 <td>Action</td>
               </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
               <tr>
                 <td>{{ $order->id }}</td>
                 <td>{{ $order->customer_name }}</td>
                 <td>{{ $order->customer_phone_number }}</td>
                 <td>BDT {{ $order->total_amount }}</td>
                 <td>BDT {{ $order->paid_amount }}</td>
                 <td>
                 <a 
                    href="{{ route('order.details',$order->id) }}">
                  Details
                 </a>
                 </td>
               </tr>
            @endforeach 
            </tbody>
         </table>
      </div>

@endsection 