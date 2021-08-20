<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/secondary-pages-css.css">
    <link href="{{ asset('/css/video-detail-page.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/video-detail-page.js')}}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <!-- <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style> -->

    <style>
        body {
            font-family: 'Roboto, Helvetica', sans-serif !important;
        }
    </style>
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
                                <img  src="{{Auth::user()->avatar}}" alt="avatar for {{Auth::user()->name}}" class="user-avatar">
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
    </div>
</body>

</html>
