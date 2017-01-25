@extends('main')
@foreach ($hotel as $hotel)
@foreach ($city as $city)
@section('title'," $hotel->hotel - $city->city")
@section('stylesheets')
    {{ Html::style('css/star.css') }}
@section('content')
  {{-- Header --}}
  <div style="background-image:url('../img/{{ $hotel->id }}.jpg'); height:400px; background-size:cover;">
      <div class="container">
        @include('partials._nav')
      <div class="row">
        <center>
          <h2>
            <div class="col-md-12 hotel-name" style="color:white;">
            {{ $hotel->hotel }}
          </h2>
          <p class="city" style="color:grey;">
              {{ $city->city }}
          </p>
          <div class="rate">
            {{-- @foreach ($avg as $avg_rate) --}}
              {{ DB::table('rates')->where('hotel_id',$hotel->id)->avg('rate') }}/5
            {{-- @endforeach --}}
          </div>
        </div>
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
    {{-- Tab Start here --}}
  <div class="tabs">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Overview</a></li>
      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Menu</a></li>
      <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Comments <span class="disqus-comment-count" data-disqus-identifier="article_1_identifier"></span></a></li>
      <li role="presentation"><a href="#rateit" aria-controls="rateit" role="tab" data-toggle="tab">Rate It</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="home">
        <div class="row" style="text-align:left">
          <div class="col-md-3">
            <h3>Contact No.</h3>
            <p class="contactno">{{ $hotel->contactno }}</p>
            <p class="remark">{{ $hotel->remark }}</p>

            <h3>Cuisines</h3>
            <p class="cuisines">{{ $hotel->cuisines }}</p>

            <h3>Cost</h3>
            <p class="cost">{{ $hotel->cost }}</p>
          </div>
          <div class="col-md-3">
            <h3>Opening Hours</h3>
            <p class="hours">{{ date('h:ia', strtotime($hotel->openfrom)) }} - {{ date('h:ia', strtotime($hotel->opento)) }}</p>

            <h3>Address</h3>
            <p class="address">{{ $hotel->address }}</p>
            <div id="map" style="width:150px;height:100px;"></div>

          </div>
          <div class="col-md-3">
            <h3>Highlights</h3>
            <p class="highlight">{{ $hotel->highlight }}</p>

            <h3>Featured in Collection</h3>
            <p class="featured">{{ $hotel->featured }}</p>
          </div>
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="profile">
        <table class="table">
          <tr>
            <th>#</th>
          <th>Dish</th>
          <th>Price</th>
        </tr>
          @foreach ($menu as $menu)
          <tr>
            <td>{{ $menu->id }}</td>
            <td>{{ $menu->dish_name }}</td>
            <td>{{ $menu->price }}</td>
          </tr>
          @endforeach
        </table>
      </div>
      <div role="tabpanel" class="tab-pane" id="messages">

        {{-- Disqus Start from here --}}
        <div id="disqus_thread"></div>
          <script>

          /**
          *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
          *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
          /*
          var disqus_config = function () {
          this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
          this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
          };
          */
          (function() { // DON'T EDIT BELOW THIS LINE
          var d = document, s = d.createElement('script');
          s.src = '//gobumpr.disqus.com/embed.js';
          s.setAttribute('data-timestamp', +new Date());
          (d.head || d.body).appendChild(s);
          })();
          </script>
          <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
      </div>
      {{-- Disqus End Here --}}

      <div role="tabpanel" class="tab-pane" id="rateit">
        @if (Auth::guest())
            <h4>Click here for Review <button type="button" class="btn btn-success" style="margin-right:10px;" data-toggle="modal" data-target="#myModal">Login</button></h4>
      @else
        @if (count($rate)!=0 )
          @foreach($rate as $rates)
            <div class="row">
              <div class="col-md-3">
                <h3>{{ Auth::user()->name }}</h3>
              </div>
              <div class="col-md-3">
                <h3>Review</h3>
                <p style="color:grey">{{ $rates->review }}</p>
              </div>
              <div class="col-md-3">
                <h3 style="padding-top:0;margin-bottom:-10px">You Rated</h3>
                <div class="rating rating2" style="color:orange;font-size:20px;float:initial">
                  @for ($i=0; $i < $rates->rate; $i++)
                    ★
                  @endfor
                  @for (; $i < 5; $i++)
                    ☆
                  @endfor
                </div>
              </div>
              <div class="col-md-3">
                <p style="color:grey;margin-top:20px;">{{ date('j M, Y h:ia' , strtotime($rates->created_at)) }}</p>
              </div>
            @endforeach
          </div>
        @else
          {{ Form::open(['route'=>['rates.store'],'files'=>true,'class'=>'form-inline']) }}
          <label class="review">Review</label>
          <textarea type="text" class="form-control review-area" name="review" aria-label="Review"></textarea>
          <input type="text" name="hotel_id" style="display:none;" value="{{ $hotel->id }}">
          <input type="text" name="hotel_slug" style="display:none;" value="{{ $hotel->slug }}">
          <input type="text" name="city_name" style="display:none;" value="{{ $city->city }}">
          <div class="rating2 rating"><!--
          --><input name="stars" id="e5" type="radio" value="5"></a><label for="e5">☆</label><!--
          --><input name="stars" id="e4" type="radio" value="4"></a><label for="e4">☆</label><!--
          --><input name="stars" id="e3" type="radio" value="3"></a><label for="e3">☆</label><!--
          --><input name="stars" id="e2" type="radio" value="2"></a><label for="e2">☆</label><!--
          --><input name="stars" id="e1" type="radio" value="1"></a><label for="e1">☆</label>
          </div>
          <button type="submit" class="btn btn-success" style="margin-top:27px;margin-left:20px;margin-right:20px;">Review</button>
          {{ Form::close() }}
          @endif
      @endif
      <table class="table">
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Review</th>
          <th>Rated</th>
          <th></th>
        </tr>
        @foreach($rate_hotel as $rate)
          <tr>
            <td>{{ $rate->id }}</td>
            <td>{{ $user = DB::table('users')->where('id',$rate->user_id)->value('name') }}</td>
            <td>{{ $rate->review }}</td>
            <td><div class="rating rating2" style="color:orange;font-size:20px;">
              @for ($i=0; $i < $rate->rate; $i++)
                ★
              @endfor
              @for (; $i < 5; $i++)
                ☆
              @endfor
            </div></td>
          </tr>
        @endforeach
      </table>

    </div>

  </div>


{{-- Tab End Here --}}
</div>
</div>
@endsection
@endforeach
@section('javascript')
  <script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
    center: new google.maps.LatLng({{ $hotel->directions }}),
    zoom: 10
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
<script id="dsq-count-scr" src="//gobumpr.disqus.com/count.js" async></script>
@endsection
@endforeach
{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu9JV__AvYU6auWV-QsJuV82TnLtrytm0&callback=initMap" async defer></script> --}}
