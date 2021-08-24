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
    <script src="{{ asset('/js/mappages.js') }}"></script>
    @stop

</head>

<body>
    @extends('app')
    @section('main')
    <main>
        <div id="nade-page">
            <!--filter -->
            @include('includes.filter')
            <!-- trang hien thi nade -->
            <div id="nade-nades" style="grid-area: nades; width:100%; margin-top: 10px; flex:1 1 auto">

                <div id="wrapper" style="position:absolute;inset:0;z-index:800; background:transparent; border-radius:8px; margin-top:10px; overflow:hidden; pointer-events:none;">
                    <div id="video-grid-view" style="opacity:0; transform: translateY(-100%) translateZ(0px); width:100%;height:100%; overflow:hidden; pointer-events: auto">
                        <div class="bg" style="position:absolute;inset:0; background: white; opacity:0.9; border-radius: 8px; border: 1px solid rgba(256,256,256); ">
                        </div>

                        <div id="video-grid" style="position:absolute;inset:0;overflow-y:auto;pointer-events:auto">
                            <div class="title" style='display:grid; grid-template-columns: 1fr 1fr 1fr; grid-template-areas: " msg . close"; padding: 8px;'>
                                <div class="close-btn" style="display: flex; grid-area: close; justify-self:end; font-size:24px; cursor:pointer; background: rgba(255,255,255,0.9); border-radius: 50%; width: 36px; height: 36px; align-items:center; justify-content:center; margin: 10px;" onclick="closeGridVideo()">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="mapview-wrap">
                    <div id="add-nade-wrapper" style="position: absolute; top: 16px; right:16px; z-index:1">
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
                        @endguest
                    </div>
                    <div id="mapview-absolute">
                        <div id="mapview-screen">
                            <div id="map-view" style="position:relative;overflow:hidden">
                                <img src='{{$map->MapImagePath}}' style="border-radius:8px;max-width:100%; max-height:100%; display:block" id="mapoverlay" onclick="printMousePos(event)">
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
    var map = <?php echo json_encode($map); ?>;
    document.body.onload = function() {
        fetchPosByMapNameAndBombId(map.MapName, 1);
    }


    function printMousePos(event) {
        coordY = event.offsetY - 10;
        coordX = event.offsetX - 11;
        console.log(coordY + "- " + coordX);
    }
</script>