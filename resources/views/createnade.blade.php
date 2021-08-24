<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Submit Nade - Clone Nades CSGO</title>

    <!-- Fonts -->
   
    @section('style-libraries')
    <link rel="stylesheet" href="/css/secondary-pages-css.css">
    <link rel="stylesheet" href="/css/create-nade.page.css">
    <link rel="stylesheet" href="/css/video-grid.css">
    @endsection
    @section('js-libraries')
    <script src="{{ asset('/js/createnadepages.js')}}"></script>
    @endsection
   
   
</head>

<body>

    @extends('app')
    @section('main')
    <main>
        <div class="guidelines-wrapper" style="color:rgb(66,66,66); margin: 10px">
            <h2>Guidelines</h2>
            <div class="rules">
                <div class="req">
                    <h3 style="margin-bottom: 10px">General rules</h3>
                    <p>
                        <b>No Duplicates</b>
                        <br>
                        Make sure your not adding a nade that already is on the site.
                        <br>
                        If your nade is thrown from a different position or using a different line up, that is fine.
                    </p>
                    <p>
                        <b>Crosshair Visibility</b>
                        <br>
                        Make sure yourr crossshair is very visible in the video.
                        <br>
                        Many crosshairs become almost invisible after video compression.
                        <br>
                        <br>
                        I recommend using the crosshair casters use for professional live streams:
                    </p>
                    <p style="background-color:#E6E6E6;border-radius: 3px; padding-left: 6px">CSGO-aNKFP-FzteR-6uRz5-4WP64-X6urD</p>
                    <br>
                    <p style="font-style: italic;">
                        Go into Settings and find the Crosshair section.
                        <br>
                        Click "Share or Import" and paste the code above.
                        <br>
                        Remember to backup your own by first clicking "Copy your code" and paste it somewhere you can find it later.
                    </p>
                    <img src="../exampleimg/crosshair_example.jpg" style="display:block; max-width: 100%; border-radius: 5px; margin-top: 16px;">

                </div>
                <div class="video-req">
                    <h2>Video requirements</h2>
                    <p>
                        - Aspect ratio 16:9
                        <br>
                        - Hide any clutter before recording
                    </p>
                    <p style="font-style: italic;">
                        Use this command to only show your crosshair in the video:
                    </p>
                    <p style="background-color:#E6E6E6;border-radius: 3px; padding-left: 6px">cl_draw_only_deathnotices 1; net_graph 0; r_drawviewmodel 1;</p>
                    <p>Upload to Gfycat after recording and copy the link.</p>
                </div>
                <div class="screenshot-req">
                    <h2>Screenshots</h2>
                    <p>You are going to need two images, one showing the end result and one for how to line it up.</p>
                    <table class="screenshot-table">
                        <tr>
                            <td width=50%>Result Image Example</td>
                            <td width=50%>Lineup Image Example</td>
                        </tr>
                        <tr>
                            <td>
                                <img src="../exampleimg/resultimgxamp.jpg" style="max-width:100%; max-height:100%;">
                            </td>
                            <td>
                                <img src="../exampleimg/lineupimgxamp.jpg" style="max-width:100%; max-height:100%;">
                            </td>
                        </tr>
                    </table>
                    <br>
                    <p>
                        To get take screenshots you have to hide everything on screen. Paste the following command in your console:
                    </p>
                    <p style="background-color:#E6E6E6;border-radius: 3px; padding-left: 6px">
                        cl_drawhud 0; r_drawviewmodel 0; net_graph 0;
                    </p>
                    <br>
                    <p>Then to reset back to normal:</p>
                    <p style="background-color:#E6E6E6;border-radius: 3px; padding-left: 6px">
                        cl_drawhud 1; r_drawviewmodel 1;
                    </p>
                </div>
            </div>
        </div>

        <div id="page-wrap">
            <h2>Submit Nade</h2>

            <form action="/submit-nade" method="POST" style="margin:0;padding:0; display:inline;background:inherit">
                @csrf
                <div id="create-nade-page">

                    <div id="infolabel" style="grid-area:info-label ">
                        <h3>Information</h3>
                        <hr size="10">
                    </div>
                    <div id="imglabel" style="grid-area:image-label">
                        <h3>Images</h3>
                        <hr>
                    </div>
                    <div id="map-select" style="grid-area:map-select">
                        <div class="label">MAP</div>
                        <div tabindex="0">
                            <select id="mapselection" name="mapselection" onchange="selectPositionOnMap()">
                                <option value="" selected disable hidden>Select...</option>
                                <option value="9">Ancient</option>
                                <option value="5">Cache</option>
                                <option value="3">Dust2</option>
                                <option value="2">Inferno</option>
                                <option value="1">Mirage</option>
                                <option value="7">Nuke</option>
                                <option value="4">Overpass</option>
                                <option value="6">Train</option>
                                <option value="8">Vertigo</option>
                            </select>
                        </div>
                    </div>
                    <div id="resultimg-select" style="grid-area:resultimg-select">
                        <div class="label">RESULT IMAGE</div>
                        <button type="button" onclick="addResultImageToPreview()">
                            SET IMAGE (ONLY JPG)
                        </button>
                    </div>
                    <div id="overview-pos" style="grid-area:overview-pos">
                        <div class="label">OVERVIEW POSITION</div>
                        <button type="button" id="pos-sel" style="cursor:not-allowed;opacity:0.4">
                            SET OVERVIEW POSITION
                        </button>
                    </div>
                    <div id="lineupimg-select" style="grid-area:lineupimg-select">
                        <div class="label">LINEUP IMAGE</div>
                        <button type="button" onclick="addLineUpImageToPreview()">
                            SET IMAGE (ONLY JPG)
                        </button>
                    </div>
                    <div id="type-select" style="grid-area:type-select">
                        <div class="label">TYPE</div>
                        <div tabindex="1">
                            <select id="typeselection" name="typeselection" onchange="changeTitle()">
                                <option value="" selected disable hidden>Select...</option>
                                <option value="1">Smoke</option>
                                <option value="2">Molotov</option>
                                <option value="3">Flash</option>
                                <option value="4">Grenade</option>
                            </select>
                        </div>
                    </div>
                    <div id="metadata" style="grid-area:mtdt-label">
                        <br>
                        <h2>Meta Data</h2>
                        <hr>
                    </div>
                    <div id="video-select" style="grid-area:videourl-select">
                        <div class="label">GFYCAT VIDEO URL</div>
                        <div tabindex="2">
                            <input id="videourlselection" name="videourlselection" type="text" placeholder="Example: https://gfycat.com/confusedwiltedamazonparrot" onchange="displayIframe()">
                        </div>
                    </div>
                    <!-- <div id="team-select" style="grid-area:team-select">
                        <div class="label">TEAM</div>
                        <div tabindex="3">
                            <select id="teamselection">
                                <option value="" selected disable hidden>Select...</option>
                                <option value="T">T</option>
                                <option value="CT">CT</option>
                            </select> 
                        </div>
                    </div> -->
                    <div id="nadeend-location" style="grid-area:nadeend">
                        <div class="label">NADE END LOCATION</div>
                        <div tabindex="4">
                            <input id="nade-end-input" name="nade-end-input" type="text" placeholder="Example: XBox">
                        </div>
                    </div>
                    <!-- <div id="movement-select" style="grid-area: mvmt">
                        <div class="label">MOVEMENT</div>
                        <div tabindex="5">
                            <select id="teamselection">
                                <option value="" selected disable hidden>Select...</option>
                                <option value="Crouching">Crouching</option>
                                <option value="Crouchwalking">Crouchwalking</option>
                                <option value="Running">Running</option>
                                <option value="Stationary">Stationary</option>
                                <option value="Walking">Walking</option>
                            </select> 
                        </div>
                    </div> -->
                    <div id="thrownfrom-location" style="grid-area:thrownfrom">
                        <div class="label">THROWN FROM</div>
                        <div tabindex="6">
                            <input id="thrown-from-input" name="thrown-from-input" type="text" placeholder="Example: T Spawn">
                        </div>
                    </div>
                    <!-- <div id="technique-select" style="grid-area:technique">
                        <div class="label">TECHNIQUE</div>
                        <div tabindex="7">
                            <select id="techniqueselection">
                                <option value="" selected disable hidden>Select...</option>
                                <option value="Mouse both">Mouse both</option>
                                <option value="Jumpthrow bind">Jumpthrow bind</option>
                                <option value="Mouse left">Mouse left</option>
                                <option value="Mouse right">Mouse right</option>
                            </select> 
                        </div>
                    </div>
                    <div id="tickrate-select" style="grid-area:tick">
                        <div class="label">TICKRATE</div>
                        <div tabindex="8">
                            <select id="tickselection">
                                <option value="" selected disable hidden>Select...</option>
                                <option value="Botht">Both</option>
                                <option value="64t">64 Tick</option>
                                <option value="128t">128 Tick</option>
                            </select> 
                        </div>
                    </div>
                    <div id="oneway-select" style="grid-area:oneway">
                        <div class="label">ONEWAY</div>
                        <div tabindex="9">
                            <input type="checkbox" id="oneway-checkbox">
                            <label for="oneway-checkbox">Is One Way</label>
                        </div>
                    </div> -->
                    <div id="description" style="grid-area:desc">
                        <div style="color: #424242; display: flex; flex-direction: column; margin-bottom: 20px;">
                            <div class="label">Description</div>
                            <textarea name="description" placeholder="Write how to perform the throw. "></textarea>
                        </div>
                        <em>
                            <i class="fas fa-check-circle" fill="rgb(0,0,255)"></i>
                            <br>
                            <span>Add a link to a video showing a pro CS:GO player throwing this nade in the description.
                                <br> Include timestamp if needed.
                                <br>It has to be the exact nade, or very very similar.</em>
                    </div>
                    <div id="preview-label" style="grid-area:previewlabel">
                        <br>
                        <h2>Preview</h2>
                        <hr>
                    </div>
                    <div id="submit-button" style="grid-area:submit">
                        <button type="submit">
                            SUBMIT
                        </button>
                    </div>

                    <div id="preview" style="grid-area: preview">
                        <div class="nade-container">
                            <div class="title">
                                <h3 class="title-text">
                                    <span class="main-title">No title</span>
                                    <span class="sub-title">...</span>
                                </h3>
                            </div>
                            <div class="player">
                                <div class="front">
                                    <div class="thumb-img">
                                        <div class="result-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="back">

                                </div>
                            </div>
                            <div class="items-bottom">
                                <div class="stats">
                                    <div class="stat-comment">
                                        <i class="fas fa-comment-dots"></i>
                                        <div class="stat-count">10</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user_steam_id" value={{Auth::user()->steam_id}}>
                </div>
            </form>
        </div>
    </main>
    @endsection
</body>

</html>