@extends('frontend.layouts.master')

  @section('main-content') 

   <div class="container">
       <br>
        <p class="text-center">Register</p>
        <hr>
        
        <form action="{{route('register')}}" class="form" method="POST">
             
            @csrf
            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" name="name" value="{{old('name')}}"  class="form-control">
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" value="{{old('email')}}" class="form-control">
            </div>
            
            <div class="form-group">
              <label for="phone_number">Phone Number</label>
              <input type="text" name="phone_number" value="{{old('phone_number')}}" class="form-control">
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group bg-success d-flex justify-content-center">
               <button type='submit' class="btn btn-success d-block">Register</button>
            </div> 

        </form>

   </div>

  @endsection 


