<nav class="navbar navbar-collapse" style="position: sticky; top: 0px; z-index: 0; display:flex; flex-direction:column">
    <div class="main" style="width: 100%; height:min-content">
        <div id="map-nav-wrap">
            <ul class="navbar-nav">
                <li class="nav-item border rounded-top bg-white">
                    <a class="nav-link" href="/maps/mirage">
                        <img src="../maps-icons/mirage.png" width="25" height="25"></img>
                        <span class="p-1">Mirage</span>
                    </a>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <a class="nav-link" href="/maps/inferno">
                        <img src="../maps-icons/inferno.png" width="25" height="25"></img>
                        <span class="p-1">Inferno</span></a>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <a class="nav-link" href="/maps/dust2">
                        <img src="../maps-icons/dust2.png" width="25" height="25"></img>
                        <span class="p-1">Dust 2</span></a>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <a class="nav-link" href="/maps/overpass">
                        <img src="../maps-icons/overpass.png" width="25" height="25"></img>
                        <span class="p-1">Overpass</span></a>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <a class="nav-link" href="/maps/cache">
                        <img src="../maps-icons/cache.png" width="25" height="25"></img>
                        <span class="p-1">Cache</span></a>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <a class="nav-link" href="/maps/train">
                        <img src="../maps-icons/train.png" width="25" height="25"></img>
                        <span class="p-1">Train</span></a>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <a class="nav-link" href="/maps/nuke">
                        <img src="../maps-icons/nuke.png" width="25" height="25"></img>
                        <span class="p-1">Nuke</span></a>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <a class="nav-link" href="/maps/vertigo">
                        <img src="../maps-icons/vertigo.png" width="25" height="25"></img>
                        <span class="p-1">Vertigo</span></a>
                </li>
                <li class="nav-item border border-top-0 rounded-bottom bg-white">
                    <a class="nav-link" href="/maps/ancient">
                        <img src="../maps-icons/ancient.png" width="25" height="25"></img>
                        <span class="p-1">Ancient</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="secondary" style="margin-top: 16px; width:100%; height:min-content">
        <div class="site-nav">
            <ul class="navbar-nav">
                <li class="nav-item pr-3 border rounded-top bg-light">
                    <a class="nav-link" href="../blog">Blog</a>
                </li>
                <li class="nav-item pr-3 border border-top-0 bg-light">
                    <a class="nav-link" href="../about">About</a>
                </li>
                @guest
                @else
                <li class="nav-item pr-3 border border-top-0 bg-light">
                    <a class="nav-link" href="../contact">Contact</a>
                </li>
                @endguest
                <li class="nav-item pr-3 border border-top-0 bg-light">
                    <a class="nav-link" href="../privacypolicy">Privacy Policy</a>
                </li>
                <li class="nav-item pr-3 py-2 border border-top-0 rounded-bottom bg-primary text-white">
                    <span style="font-size:14px">Powered by Steam</span>
                    <br>
                    <span>&copy;</span> <span style="font-size:12px">2021 CSGO Nades</span>
                </li>
            </ul>
        </div>
    </div>
</nav>