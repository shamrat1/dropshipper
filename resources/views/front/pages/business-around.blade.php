@extends('front.layouts.app')
@section('main-body')
   <div class="main-body">
      <!--Google map-->
      <div id="map" class="z-depth-1-half" style="height: 400px">
      </div>
      <div class="content p-5">
         <h4 class="text-center">Business Around You</h4>
         <br>
        <div class="row justify-content-center" id="sync1">

          </div>
    </div>

      
      <!--Google Maps-->
   </div>
@endsection
@section('script')
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsH2XHEdeV4vZ7t6HN1126oOH1mGjCF4U&v=3.exp&callback=initMap">
    </script>
    <script async defer>
      let businesses = @json($business);
      // console.log(businesses)
      let lat;
      let lon;
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 31.0461, lng: 34.8516},
          zoom: 15
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };


            infoWindow.setPosition(pos);
            infoWindow.setContent('You are here.');
            infoWindow.open(map);
            map.setCenter(pos);
            addBusinessMarkers();
            getNearByBusinesses(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        
      }
      
      
      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

      function addBusinessMarkers() {
        businesses.forEach(function (item) {
          var marker = new google.maps.Marker({
          animation: google.maps.Animation.DROP,
          position: { lat: parseFloat(item['lat']), lng: parseFloat(item['lon']) },
          map: map,
          title: item['name']
          });

          let infoString = "<h5>"+item['name']+"</h5><br><p><b>Address: </b>"+item['address']+"</p>";
          var markerInfowindow = new google.maps.InfoWindow;
          markerInfowindow.setContent(infoString);
          marker.addListener('click', function() {
              markerInfowindow.open(map, marker);
          });
        });
      }

      function getNearByBusinesses(position) {
        // let parent = ;
        
        let url = "{{{ url('/') }}}";
        let dataURL = url+"/distance/"+position.lat+"/"+position.lng;
        $.ajax(dataURL,{success: function (data,status,xhr) {
          let html = '';
          data.forEach(function (item) {
            let businessCard = "<div class='col-md-2'><div class='card' style='width: 18rem;'><img class='card-img-top' src='product_image/8c5791a15c.jpeg' alt='Card image cap'><div class='card-body'><h5 class='card-title'>"+item.name+"</h5><small class=''>Opening Hours: "+item.opening_hours +"</small><p class='card-text'>"+item.description+"</p><p class='card-text'>"+item.address+"</p><p class='card-text'>"+item.mobile+"</p></div><div class='card-footer text-muted'>Around "+Math.round(item.distance)+" KM from your location</div></div></div>";
            html += businessCard;
          });
          $('#sync1').html(html);
        },
        error:function(){
          let error = "<span class='well'>Error Loading Business data. Try again.</span>";
          $('#sync1').html(error);
        }});
      }
      $(document).ready(function () {
        $('.owl-carousel').owlCarousel();
      });

      
   </script>
@endsection