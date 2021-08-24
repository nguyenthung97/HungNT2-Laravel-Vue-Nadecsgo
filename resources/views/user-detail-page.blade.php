<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    @section('style-libraries')
    <link rel="stylesheet" href="/css/secondary-pages-css.css">
    <link href="{{ asset('/css/user-detail-page.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/video-grid.css') }}" rel="stylesheet">
    @endsection
    @section('js-libraries')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('/js/user-detail-page.js') }}"></script>
    @endsection

</head>

<body onload="fetchVideoBySteamIDAndMapID('{{$user->steam_id}}',2)">
    @extends('app')
    @section('main')
    <main>
        <div class="user-container">
            <div class="user-details-wrapper">
                <div class="user-details">
                    <h1>
                        <img src={{$user->avatar}} alt="avatar for {{$user->name}}">
                        <a href="https://steamcommunity.com/profiles/{{$user->steam_id}}" target="_blank">{{$user->name}}</a>
                    </h1>
                    <div class="member_since">
                        <span style="font-weight: 200; font-size:16px">Member since: &nbsp; &nbsp;{{$user->created_at->format('M d.Y')}}</span>
                        <br>

                        <span style="font-weight: 200; font-size:16px">Last active: &nbsp; &nbsp;{{\Carbon\Carbon::parse($user->last_seen)->format('M d.Y H:i')}}</span>

                    </div>
                    <br>
                    <button class="btn-edit-profile">
                        <span class="btn-icon">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="btn-label">Edit user profile</span>
                    </button>
                </div>
            </div>
            <div class="user-nades">
                <h2>Nades by {{$user->name}}</h2>
                <div class="user-nade-map-nav">
                    @foreach ($maps as $map)
                    <button class="user-map-nav-item" onclick="fetchVideoBySteamIDAndMapID('{{$user->steam_id}}',{{$map->id}})">
                        <span class="nav-icon">
                            <div style="display:block;overflow:hidden;position:absolute;top:-5px;left:0;bottom:0;right:0;box-sizing:border-box;margin:0">
                                <img src="../maps-icons/{{ strtolower($map->MapName)}}.png" width="20" height="20">
                            </div>
                        </span>
                        {{$map->MapName}}
                    </button>
                    @endforeach


                </div>
                <div id="video-grid"></div>
            </div>
        </div>
    </main>
    @endsection
</body>

</html>