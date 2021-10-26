<template>
    <nav class="navbar navbar-collapse" style="position: sticky; top: 0px; z-index: 0; display:flex; flex-direction:column">
    <div class="main" style="width: 100%; height:min-content">
        <div id="map-nav-wrap">
            <ul class="navbar-nav">
                <li class="nav-item border rounded-top bg-white">
                    <router-link class="nav-link" to="/maps/mirage">
                        <img :src="'/image/maps-icons/mirage.png'" width="25" height="25">
                        <span class="p-1">Mirage</span>
                    </router-link>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <router-link class="nav-link" to="/maps/inferno">
                        <img :src="'/image/maps-icons/inferno.png'" width="25" height="25">
                        <span class="p-1">Inferno</span></router-link>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <router-link class="nav-link" to="/maps/dust2">
                        <img :src="'/image/maps-icons/dust2.png'" width="25" height="25">
                        <span class="p-1">Dust 2</span></router-link>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <router-link class="nav-link" to="/maps/overpass">
                        <img :src="'/image/maps-icons/overpass.png'" width="25" height="25">
                        <span class="p-1">Overpass</span></router-link>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <router-link class="nav-link" to="/maps/cache">
                        <img :src="'/image/maps-icons/cache.png'" width="25" height="25">
                        <span class="p-1">Cache</span></router-link>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <router-link class="nav-link" to="/maps/train">
                        <img :src="'/image/maps-icons/train.png'" width="25" height="25">
                        <span class="p-1">Train</span></router-link>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <router-link class="nav-link" to="/maps/nuke">
                        <img :src="'/image/maps-icons/nuke.png'" width="25" height="25">
                        <span class="p-1">Nuke</span></router-link>
                </li>
                <li class="nav-item border border-top-0 bg-white">
                    <router-link class="nav-link" to="/maps/vertigo">
                        <img :src="'/image/maps-icons/vertigo.png'" width="25" height="25">
                        <span class="p-1">Vertigo</span></router-link>
                </li>
                <li class="nav-item border border-top-0 rounded-bottom bg-white">
                    <router-link class="nav-link" to="/maps/ancient">
                        <img :src="'/image/maps-icons/ancient.png'" width="25" height="25">
                        <span class="p-1">Ancient</span></router-link>
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
               
                <li class="nav-item pr-3 border border-top-0 bg-light">
                    <a class="nav-link" href="../contact">Contact</a>
                </li>
           
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
</template>
<script>
export default {
    name:'map-navigator',
}   
</script>
