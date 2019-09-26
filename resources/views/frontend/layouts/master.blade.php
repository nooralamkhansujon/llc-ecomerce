<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

       <link href="{{ mix('css/app.css') }}" rel="stylesheet">
       <link href="{{ mix('css/all.css') }}" rel="stylesheet">
    
    @yield('before_head')

 </head>
<body>
 
@include('frontend.partials.header')



<main role="main">
 <div class="container text-light">
   <div class="row">
     <div class="col-md-12">
        @include('frontend.partials.message')
     </div>
   </div>
 </div>
@yield('main-content')
  
</main>


 @include('frontend.partials.footer')

  <script src="{{mix('js/all.js')}}"></script>

  @yield('before_body')

    </body>
</html>
