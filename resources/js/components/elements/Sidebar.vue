<template>
  <aside id="sidebar">
    <div id="sidebar-wrapper">
        <div id="discord-coffee">
            <div class="discord rounded-top" style="background-color: rgb(114,137,218)">
            <a href="https://discord.gg/010h0KFCBNASyMUKv" style="text-decoration:none">
                <div class="action">
                    <div class="discord-message" style="font: size 16px;">Join us on 
                    <span style="font-weight:500">Discord</span>
                    </div>
                    <div class="discord-logo" style="font-size: 30px; color: #fff; width: 30px;">
                        <i class="fab fa-discord"></i>
                    </div>
                </div>
            </a>
            </div>  
            
            <div class="coffee rounded-bottom" style="background-color: orange">
            <a href="#" style="text-decoration:none">
                <div class="action">
                    <div class="coffee-message" style="font: size 16px;">Buy me a
                    <span style="font-weight:500">Coffee</span>
                    </div>
                    <div class="coffee-logo" style="font-size: 30px; color: #fff; width: 30px;">
                        <i class="fas fa-coffee"></i>
                    </div>
                </div>
            </a>
            </div>
        </div>
        
        <div id="donator" style="padding: 16px; color: rgb(66, 66, 66); background: rgb(255, 255, 255); border-radius: 8px; margin-top: 16px">
            <h1 style="font-size: 17px; margin: 0px 0px 10px; padding: 0px;">
                Find the best smokes, flashbangs, molotovs and grenades for {{$map->MapName}}.     
            </h1>
            <h2 style="font-size: 14px; margin: 0px; padding: 0px;">
                Don't be like BOT Bob, get some nades.
            </h2>
            <div style="margin-top:16px;border-top: 1px solid rgba(0,0,0,0.07)">
                <div class="label" style="margin-top: 16px; font-size: 14px">Nade Contributors</div>
                <div class="contributors">
                   <a href="" class="contributor">
                       <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/9a/9af5f27bb7c075b6bfa04711fe7437f2e9521553_medium.jpg" 
                       class="contributor-img">
                   </a>
                   <a href="" class="contributor">
                       <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/de/de497e8525e37d666b1b00b0481b4ec7333a6f64_medium.jpg" 
                       class="contributor-img">
                   </a>
                   <a href="" class="contributor">
                       <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/32/32f1750a83cc624bf2498753f2f5167b1b91e66d_medium.jpg" 
                       class="contributor-img">
                   </a>
                   <a href="" class="contributor">
                       <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/65/6504c18d42a29124b526e00496b04635907497f0_medium.jpg" 
                       class="contributor-img">
                   </a>
                   <a href="" class="contributor">
                       <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/df/df735314e584c85ab2a16abce1253d59a19e34bb_medium.jpg" 
                       class="contributor-img">
                   </a>
                   <a href="" class="contributor">
                       <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/16/16f88fe09fa83abb7caaa3b18661d7c978909516_medium.jpg" 
                       class="contributor-img">
                   </a>
                   <a href="" class="contributor">
                       <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/56/56444f42726c508df0b2f802d07ecd504242ae3c_medium.jpg" 
                       class="contributor-img">
                   </a>
                   <a href="" class="contributor">
                       <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/45/4539de01a965c8cb2765458f0bf041bffbb9a3d5_medium.jpg" 
                       class="contributor-img">
                   </a>
                   <a href="" class="contributor">
                       <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/e1/e1dde7fe207a397634580d4755f7890ccf24ddd7_medium.jpg" 
                       class="contributor-img">
                   </a>
                   <a href="" class="contributor">
                       <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/26/26f616513386e08a725ddd5a1b4bc6745e24cab5_medium.jpg" 
                       class="contributor-img">
                   </a>
                   <a href="" class="contributor">
                       <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/e1/e1dde7fe207a397634580d4755f7890ccf24ddd7_medium.jpg" 
                       class="contributor-img">
                   </a>
                     <a href="" class="contributor">
                       <img src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/16/16f88fe09fa83abb7caaa3b18661d7c978909516_medium.jpg" 
                       class="contributor-img">
                </div>        
            </div>
        </div>
    </div>

</aside>

</template>

<script>
export default {
    name: 'sidebar-component'
}
</script>
