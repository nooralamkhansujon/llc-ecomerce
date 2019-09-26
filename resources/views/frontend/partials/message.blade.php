@if(session()->has('message'))

     @if(session()->get('type') == 'success')
      <div class="alert alert-success">
          <li>
            {{ session()->get('message') }}
           <span align="right" data-dismiss="alert">
           &times;</span>
          </li>
      </div>
      @elseif(session()->get('type') == 'warning')
      <div class="alert alert-warning">
          <li>
            {{ session()->get('message') }}
           <span align="right" data-dismiss="alert">
           &times;</span>
          </li>
      </div>  
      @endif
      
@endif


@if($errors->any())
    <div class="alert alert-warning">
        @if(count($errors) > 1)
            
            <ul>
              @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach 
            </ul>

        @else  
            {{$errors->first()}}
        @endif 
    </div>
@endif 
