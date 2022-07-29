<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />


<style>
    #{{$mapId}} {
    @if(! isset($attributes['style']))
        height: 100vh;
    @else
        {{ $attributes['style'] }}
    @endif
    }
</style>

<div id="{{$mapId}}" @if(isset($attributes['class']))
 class='{{ $attributes["class"] }}'
@endif
></div>

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.8.0/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><script>

    var mymap = L.map('{{$mapId}}').setView([{{$centerPoint['lat'] ?? $centerPoint[0]}}, {{$centerPoint['long'] ?? $centerPoint[1]}}], {{$zoomLevel}});
    @foreach($markers as $marker)
     @if(isset($marker['icon']))
       var icon = L.icon({
        iconUrl: '{{ $marker['icon'] }}',
        iconSize: [{{$marker['iconSizeX'] ?? 32}} , {{ $marker['iconSizeY'] ?? 32 }}],
       });
     @endif
    var marker = L.marker([{{$marker['lat'] ?? $marker[0]}}, {{$marker['long'] ?? $marker[1]}}]);
    marker.addTo(mymap);
    @if(isset($marker['info']))
    marker.bindPopup(@json($marker['info']));
    @endif
    @endforeach

    @if($tileHost === 'mapbox')
        let url{{$mapId}} = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={{config('maps.mapbox.access_token', null)}}';
    @elseif($tileHost === 'openstreetmap')
        let url{{$mapId}} = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    @else
        let url{{$mapId}} = '{{$tileHost}}';
    @endif
    L.tileLayer(url{{$mapId}}, {
        maxZoom: {{$maxZoomLevel}},
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);

    mymap.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        marker.setLatLng([lat, lng])
        Livewire.emit('saveLocation', lat, lng)
    });

</script>
