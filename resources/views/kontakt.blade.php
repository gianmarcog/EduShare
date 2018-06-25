@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 top-buffer">
                <h1>Kontakt</h1>
                <hr>
                <p>EduShare</p>
                <p>Alfred-Wachtel-Str. 8</p>
                <p>78462 Konstanz</p>
                <div id="gmeg_map_canvas"></div>
                <script type="text/javascript"
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFXwYjWlimuQ4FU8C5Yn7GyB8q_vlbADc"></script>
                <script>
                    var gmegMap, gmegMarker, gmegInfoWindow, gmegLatLng;

                    function gmegInitializeMap() {
                        gmegLatLng = new google.maps.LatLng(47.667787, 9.171383);
                        gmegMap = new google.maps.Map(document.getElementById("gmeg_map_canvas"), {
                            zoom: 15,
                            center: gmegLatLng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });
                        gmegMarker = new google.maps.Marker({map: gmegMap, position: gmegLatLng});
                        gmegInfoWindow = new google.maps.InfoWindow({content: '<b>EduShare</b><br>Alfred-Wachtel-Str. 8<br>78462 Konstanz'});
                        gmegInfoWindow.open(gmegMap, gmegMarker);
                    }

                    google.maps.event.addDomListener(window, "load", gmegInitializeMap);
                </script>
            </div>
        </div>
    </div>

@endsection