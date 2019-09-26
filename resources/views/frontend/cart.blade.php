@extends('frontend.layouts.master')

  @section('main-content') 
    @include('frontend.partials.hero');
    <div class="container">
      <br>
        <p class="text-center">Cart</p>
      <hr>

      @if(session()->has('message'))
      <div class="alert alert-success">
          <li>
            {{ session()->get('message') }}
           <span align="right" data-dismiss="alert">
           &times;</span>
          </li>
      </div>
      @endif

      <div class="table-responsive">

        @if(empty($cart))
              <div class="alert alert-info">
                 Please add some products to your cart. Browse products 
              </div>
        @else 

         <table class="table table-bordered">
                <thead>
                    <tr>
                       <th>Serial</th>
                       <th>Product</th>
                       <th>Quantity</th>
                       <th>Unit Price</th>
                       <th>Total Price</th>
                       <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @php $i =1; @endphp 

                   @foreach($cart as $key=>$product)
                      
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $product['title'] }}</td>
                        <td>
                        <input type="number" name="quantity" value="{{ $product['quantity'] }}"/>
                        </td>
                        <td>BDT {{ number_format($product['unit_price'],2) }}</td>
                        <td>BDT {{ number_format($product['total_price'],2)  }}</td>
                        <td>
                            <form action="{{route('cart.remove')}}" method="POST">
                                @csrf 
                                <input type="hidden" name="product_id" value="{{$key}}">
                                <button type="submit" class="btn btn-danger">
                                <i class="fa fa-remove"></i>
                                </button>
                            </form>
                        </td>
                      </tr>
                   @endforeach 

                   <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>BDT {{number_format($total,2)}}</td> 
                        <th></th>
                   </tr>
                    
                </tbody>
        </table>
        <div class="d-flex justify-content-between">
            <a class="btn btn-danger btn-lg" id="removeCart" href="{{route('cart.clear')}}" onclick="return remove()">Clear Cart</a>
            <a align="right" class="btn btn-success btn-lg" id="removeCart" 
            href="{{route('checkout')}}" >Checkout</a>
        </div>
      
        @endif 
       
     
      </div>
    
    </div>

  @endsection 



<script type="text/javascript">
  function remove(event){
      
      if(confirm("Are you sure! you want to remove the cart")){
          return true;
      }
      return false;
    
  }

</script>