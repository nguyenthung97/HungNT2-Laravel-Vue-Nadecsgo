<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/icons/favicon.ico" type="image/x-icon">
    <title>{{$map->MapName}} Smokes,Flashes and Molotovs - Clone CSGONades</title>

    <!-- Fonts -->


    @section('style-libraries')
    <link href="/css/map-pages.css" rel="stylesheet">
    <link href="/css/video-grid.css" rel="stylesheet">
    @stop
    @section('js-libraries')
    <!-- <script src="{{ asset('/js/mappages.js') }}"></script> -->
    @stop

</head>

<body>
    @extends('app')
    @section('main')
    <main>
        <div id="nade-page">
            <!--filter -->
            <nade-filter-component map-name={{$map->MapName}}></nade-filter-component>
            <!-- trang hien thi nade -->
            <div id="nade-nades" style="grid-area: nades; width:100%; margin-top: 10px; flex:1 1 auto">

                <video-nade-list-component></video-nade-list-component>

                <div id="mapview-wrap">
                    <!-- <div id="add-nade-wrapper" style="position: absolute; top: 16px; right:16px; z-index:1">
                        @guest
                        <button class="add-btn" onclick="createModalSignIn()">
                            <span style="font-size:13px; font-weight: 700">Add Nade</span>
                            <i class="fas fa-plus" fill="green"></i>
                        </button>
                        @else
                        <a href="../createnade">
                            <button class="add-btn">
                                <span style="font-size:13px; font-weight: 700">Add Nade</span>
                                <i class="fas fa-plus" fill="green"></i>
                            </button>
                        </a>
                        @endguest -->
                        <signin-modal-component :is-guest="{{ json_encode(auth()->guest()) }}"></signin-modal-component>
                    <!-- </div> -->
                    <div id="mapview-absolute">
                        <div id="mapview-screen">
                            <div id="map-view" style="position:relative;overflow:hidden">
                                <img src='{{$map->MapImagePath}}' style="border-radius:8px;max-width:100%; max-height:100%; display:block" id="mapoverlay" onclick="printMousePos(event)">
                                <pos-view-component :map-name="'{{$map->MapName}}'"></pos-view-component>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </main>
    @stop
    @section('sidebar')
    @include('includes.sidebar')
    @endsection

</body>

</html>

<script type="text/javascript">
    
    function printMousePos(event) {
        coordY = event.offsetY - 10;
        coordX = event.offsetX - 11;
        console.log(coordY + "- " + coordX);
    }
</script>