<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @section('style-libraries')
    <link rel="stylesheet" href="/css/secondary-pages-css.css">
    <link href="{{ asset('/css/video-detail-page.css') }}" rel="stylesheet">
    @endsection
    @section('js-libraries')
    <script src="{{ asset('/js/video-detail-page.js')}}"></script>
    @endsection
  
</head>

<body onload="displayIframe({{$video->id}}); displayComment({{$video->id}})">
    <div id="page">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-0">
                <a class="navbar-brand" href={{url()->previous()}}>
                    <span style="font-size: 1.5em; color: Dodgerblue">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                </a>
                <span style="font-size: 1.5em; color:black">{{$video->fullDetailedVideoName}}</span>
                <div class="d-flex ml-auto flex-row">

                    <div class="p-2">
                        <button class="btn border-secondary" onclick="darkModeTrigger()">
                            <i class="fas fa-moon"></i>
                        </button>
                    </div>

                    @guest
                    <div class="p-2">
                        <a href="/login">
                            <button class="btn btn-primary">
                                <i class="fab fa-steam"></i>
                                Sign in with <strong>STEAM</strong>
                            </button>
                        </a>
                    </div>
                    @else
                    <div class="p-2">
                        <div class="drop-down">
                            <button type="button" class="dropdown-toggle button" style="outline:none; border:none; background:transparent" data-toggle="dropdown">
                                <img src="{{Auth::user()->avatar}}" alt="avatar for {{Auth::user()->name}}" class="user-avatar">
                                <span class="pr-1 text-dark">{{Auth::user()->name}}</span>
                            </button>
                            <div>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="../createnade">Add Nades</a></li>
                                    <li><a class="dropdown-item" href="../users/{{Auth::user()->steam_id}}">Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Sign Out </a></li>
                                </ul>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }} </form>
                            </div>
                        </div>
                    </div>
                    @endguest
                </div>
            </nav>
        </header>
        <main>
            <div style="border-radius:8px ;border: 1px solid rgba(0,0,0,0.3)">
                <div class="nade-meta-data">
                    <div class="nade-meta-data-item">
                        <h4>Type</h4>
                        <span>Smoke</span>
                    </div>
                    <div class="nade-meta-data-item">
                        <h4>Movement</h4>
                        <span>Stationary</span>
                    </div>
                    <div class="nade-meta-data-item">
                        <h4>Technique</h4>
                        <span>Mouse left</span>
                    </div>
                </div>
                <div id="video-lineup-wrapper">
                    <div class="tab-selector">
                        <div class="selected-bg">
                            <div class="selected-bg-fill"></div>
                        </div>
                        <button class="tab-video tab-btn selected" onclick="displayIframe({{$video->id}})">VIDEO</button>
                        <button class="tab-lineup tab-btn" onclick="displayLineUpImage({{$video->id}})">LINE UP</button>
                    </div>
                    <div class="media-container">
                    </div>
                </div>
            </div>

            <div id="description" style="border-radius: 8px; background: white; border: none; margin-top:16px; padding: 10px">
                <h3 style="font-size:22px">Description</h3>
                <hr>
                <div>
                    <div>
                        <p>Simple throw with the lineup used to smoke off coffin player and get some sort of one way if they decide to get off and go to site, since the B site is elevated, the T's will be seeing beneath the smoke and the CT playing coffin will not be able to see them, thus making it a one-way.</p>
                    </div>
                </div>
            </div>
            <div class="comments" style="border-radius: 8px; background: white; border:none; margin-top: 16px; padding: 10px;">
                <form action="/add-comment" method="POST" id="comment_form">
                    @csrf
                    <div class="form-group" style="display:flex; flex-direction:column">
                        <textarea name="comment_message" placeholder="Write a comment. It's a person on the other side, don't be too mean!"></textarea>
                        <button type="submit" id="submit-btn">SUBMIT</button>
                        @auth
                        <input type="hidden" name="comment_sender_name" value={{Auth::user()->name}}>
                        <input type="hidden" name="comment_sender_avatar" value={{Auth::user()->avatar}}>
                        <input type="hidden" name="video_id" value={{$video->id}}>
                        @endauth
                    </div>
                </form>
            </div>
            <br>
            <div id="display_comment"></div>
        </main>
        <div class="user" style="display: flex; grid-area: user; flex-direction: column">
            <div class="user-avatar">
                <a href="/users/{{$video->steam_id}}">
                    <img src="{{$video->avatar}}" class="user-avatar-img">
                </a>
            </div>
        </div>
    </div>
</body>

</html>