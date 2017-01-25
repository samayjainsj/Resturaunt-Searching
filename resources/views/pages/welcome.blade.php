@extends('main')
@section('title','GoBumpr ')
@section('content')

{{-- Header --}}
<div style="background-image:url('img/foodcover.jpg'); height:400px; background-size:cover;">
    <div class="container">
      @include('partials._nav')
    <div class="row">
      <center>
      <div class="col-md-12 big-logo">
        <img src="img/logo-big.png" height="120">
      </div>
    </center>
    </div>
    <div class="row">
      <center>
      <div class="col-md-12 tag-line">
        <h4 style="color:white;">Find Restaurants in India</h4>
      </div>
    </center>
    </div>
    {{-- Search bar here  --}}
    <div class="search">
      <center>
        {{ Form::open(['route'=>['hotel.show'],'files'=>true,'class'=>'form-inline']) }}
          <div class="form-group">
            <select class="js-example-basic-single" style="width:100%;" name="city" id="city">
              @foreach ($city as $city)
                <option value='{{ $city->id }}'>{{ $city->city }}</option>
              @endforeach
            </select>
        </div>
          <div class="form-group">
            <select class="js-example-basic-single" style="width:100%;" name="hotel" id="hotel">
                <option value=></option>
            </select>
          </div>
          <button type="submit" class="btn btn-default">Go</button>
        {{ Form::close() }}
      </center>
      </div>
    </div>
    {{-- End Search bar --}}


    </div>
 </div>
 {{-- Header End here --}}
</div>
</div>
</div>
{{-- Modal Closed --}}


<div class="container">
<div class="row">
<div class="col-md-12">
 <h2 class="text-center">Quick Search</h2>
</div>
</div>

{{-- Owl carousel --}}
<div class="row quick">
 <div class="large-12 columns">
   <div class="owl-carousel owl-theme">
     <div class="item">
       <img src="img/breakfast.png" style="height:80px;width:80px;" class="center-block">
       <p class="text-center">Breakfast</p>
     </div>
     <div class="item">
         <img src="img/rice.png" style="height:80px;width:80px;" class="center-block">
         <p class="text-center">Lunch</p>
     </div>
     <div class="item">
       <img src="img/covering.png" style="height:80px;width:80px;" class="center-block">
       <p class="text-center">Dinner</p>
     </div>
     <div class="item">
       <img src="img/cup.png" style="height:80px;width:80px;" class="center-block">
       <p class="text-center">Coffee House</p>
     </div>
     <div class="item">
       <img src="img/icecream.png" style="height:80px;width:80px;" class="center-block">
       <p class="text-center">Desserts</p>
     </div>
     <div class="item">
       <img src="img/wine.png" style="height:80px;width:80px;" class="center-block">
       <p class="text-center">Drinks</p>
     </div>
     <div class="item">
       <img src="img/burger.png" style="height:80px;width:80px;" class="center-block">
       <p class="text-center">Fast Food</p>
     </div>
     </div>
 </div>
</div>

{{-- reviewed Rasturaunts --}}
<div class="reviewed">
<div class="row">
 <h2 class="text-center">Our Restaurants</h2>
     @foreach ($hotel as $hotels)
       <div class="card">
     <div class="row">
       <div class="col-md-4">
     <div style="background-image:url('img/{{ $hotels->id }}.jpg'); height:118px;width:118px; background-size:cover;">
     </div>
      </div>
      <div class="col-md-8">
        <h4>{!!Html::linkRoute('hotel.select',$hotels->hotel,["city_name" => DB::table('cities')->where('id',$hotels->city_id)->value('city'),"hotel" => $hotels->slug],array('class'=>'hotel-name')) !!}</h4>
        {{-- <h4>{{ $hotels->hotel }}</h4> --}}
        <p style="color:grey;">Rate {{ DB::table('rates')->where('hotel_id',$hotels->id)->get()->avg('rate') }}/5</p>
        <p>Featured : {{ $hotels->featured }}</p>
      </div>
    </div>
  </div>
@endforeach
</div>
</div>


<div class="about" id="about">
  <h2>About Us</h2>
  <h4><u>We do this by</u></h4>
  <p style="text-align:justify;">Helping people discover great places around them.
  Our team gathers information from every restaurant on a regular basis to ensure our data is fresh. Our vast community of food lovers share their reviews and photos, so you have all that you need to make an informed choice.
</p>
</div>
{{-- End Here --}}
</div>
@endsection
@section('javascript')
  {{ Html::script('js/select2.min.js') }}
  <script>
    $(document).ready(function() {
      var owl = $('.owl-carousel');
      owl.owlCarousel({
        items: 6,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true
      });
      $('.play').on('click', function() {
        owl.trigger('play.owl.autoplay', [1000])
      })
      $('.stop').on('click', function() {
        owl.trigger('stop.owl.autoplay')
      })
    })
  </script>
  <script type="text/javascript">
  $(document).ready(function() {
    $(".js-example-basic-single").select2();
  });
  </script>
  <script>
    $('#city').on('change',function(e){
      console.log(e);
      var city_id = e.target.value;

      //ajax
      $.get('/ajax-hotel?city_id=' +city_id, function(data){
        $('#hotel').empty();
        $.each(data,function(index, hotelObj){
          $('#hotel').append('<option value="'+hotelObj.id+'">'+hotelObj.hotel+'</option>');
        });
      });
    });

  </script>
@endsection
