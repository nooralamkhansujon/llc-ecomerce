@extends('frontend.layouts.master')

  @section('main-content') 

   <div class="container">
       <br>
        <p class="text-center">Login</p>
        <hr>
        <form action="{{route('login')}}" class="form" method="POST">
             
            @csrf
        
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" value="{{old('email')}}" class="form-control">
            </div>
            
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group bg-success d-flex justify-content-center">
               <button type='submit' class="btn btn-success d-block">Login</button>
            </div> 

        </form>

   </div>

  @endsection 



