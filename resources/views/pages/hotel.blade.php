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
        <h4>Find Restaurants in India</h4>
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
          <button type="submit" class="btn btn-default" style="padding-top:0px;">Go</button>
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


{{-- Rasturaunts --}}
<div class="reviewed">
<div class="row">
 <h2 class="text-center">Our Restaurants</h2>
     @foreach ($hotel as $hotels)
       <div class="card">
     <div class="row">
       <div class="col-md-4">
     <div style="background-image:url('img/{{ $hotels->id }}.jpg'); height:100px; background-size:cover;">
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
