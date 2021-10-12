<template>
<div id="filter" style="grid-area: filter">
    <div class="filter-bar">
        <div style="grid-area:fav; margin-bottom: 16px">
            <div class="icon-label">FAV</div>
            <div class="icon-button-wrapper" style="border-radius: 8px;">
                <button class="icon-button">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" 
                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
        <div style="grid-area:type;margin-bottom: 16px">
            <div class="icon-label">TYPE</div>
            <div class="icon-button-wrapper-group">
                <div class="icon-button-wrapper rounded-top" style="border-bottom:none">
                    <button class="icon-button icon-smoke" @click="getPosByMapNameAndBombIDFilter(mapName,1)">
                        <svg width="26" height="26" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="25" fill="#D9D9D9" class="t-left"></circle>
                            <circle cx="50" cy="50" r="25" fill="#D9D9D9" class="t-right"></circle>
                            <circle cx="50" cy="50" r="25" fill="#D9D9D9" class="b-left"></circle>
                            <circle cx="50" cy="50" r="25" fill="#D9D9D9" class="b-right"></circle>
                            <circle cx="50" cy="50" r="25" fill="#D9D9D9" class="c-left"></circle>
                            <circle cx="50" cy="50" r="25" fill="#D9D9D9" class="c-right"></circle>
                        </svg>
                    </button>
                </div>
                <div class="icon-button-wrapper" style="border-bottom:none;">
                    <button class="icon-button icon-molotov" @click="getPosByMapNameAndBombIDFilter(mapName,2)">
                        <svg width="26" height="26" viewBox="0 0 100 100">
                            <path 
                            d="M25.3982 48.7773C19.3236 45.1276 15.1936 28.4548 13.8879 20.5747C13.8893 19.9363 13.8938 19.2846 13.9016 18.6215C8.3084 27.1051 5 37.6095 5 48.9833C5 77.1591 25.3031 100 50.3483 100C75.3934 100 95.6965 77.1591 95.6965 48.9833C95.6965 36.7343 91.8594 25.4936 85.4636 16.6995C83.0925 27.4231 77.6266 34.0558 73.0224 37.9924C67.5367 14.5412 47.3277 4.2475 37.7941 0C41.9891 20.3651 32.1531 40.1073 25.3982 48.7773Z" 
                            fill="#CE1B1B">
                            </path> 
                        </svg>  
                    </button>
                </div>
                <div class="icon-button-wrapper" style="border-bottom:none;">
                    <button class="icon-button icon-flash" @click="getPosByMapNameAndBombIDFilter(mapName,3)" >
                        <svg width="26" height="26" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 57L71 0L52.1429 57H16Z" fill="#464646"></path>
                            <path d="M85 44L31 100L49.5143 44H85Z" fill="#464646" ></path>
                            <path d="M15 56L69 0L50.4857 56H15Z" fill="#FFD600"></path>
                            <path d="M84 44L29 100L47.8571 44H84Z" fill="#FFD600"></path>
                        </svg>
                    </button>
                </div>
                <div class="icon-button-wrapper rounded-bottom">
                    <button class="icon-button icon-grenade" @click="getPosByMapNameAndBombIDFilter(mapName,4)">
                        <svg width="26" height="26" viewBox="0 0 100 100">
                            <path d="M50 0L56.75 39.1747L96.7654 25L63.5 50L96.7654 75L56.75 60.8253L50 100L43.25 60.8253L3.23463 75L36.5 50L3.23463 25L43.25 39.1747L50 0Z" fill="#CE1B1B"></path>
                            <path d="M50 14L54.75 42.2058L82.909 32L59.5 50L82.909 68L54.75 57.7942L50 86L45.25 57.7942L17.091 68L40.5 50L17.091 32L45.25 42.2058L50 14Z" fill="#AC1C1C"></path>
                            <path d="M39.4887 36.6548L31.1415 21.2571L17.0686 15.7767L39.4887 36.6548Z" fill="black"></path>
                            <path d="M39.2623 23.2713L35.6463 17.0083L38.2047 12.3997L39.2623 23.2713Z" fill="black"></path>
                            <path d="M60.4394 65.5175L67.7217 78.2732L79.6326 83.0121L60.4394 65.5175Z" fill="black"></path>
                            <path d="M59.3836 79.31L62.9996 85.573L60.4412 90.1816L59.3836 79.31Z" fill="black"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
        </div>
        <!-- <div style="grid-area:tick;margin-bottom: 16px">
            <div class="icon-label">TICK</div>
            <div class="icon-button-wrapper-group">
                <div class="icon-button-wrapper rounded-top" style="border-bottom:none">
                    <button class="icon-button">
                        <span style="font-size:14px;">128</span>
                    </button>
                </div>
                <div class="icon-button-wrapper rounded-bottom">
                    <button class="icon-button">
                        <span style="font-size:14px;">64</span>
                    </button>
                </div>
            </div>
        </div>
        <div style="grid-area:team;margin-bottom: 16px">
            <div class="icon-label">TEAM</div>
            <div class="icon-button-wrapper-group">
                <div class="icon-button-wrapper rounded-top" style="border-bottom:none">
                    <button class="icon-button">
                        <span style="font-size:14px;">T</span>
                    </button>
                </div>
                <div class="icon-button-wrapper rounded-bottom">
                    <button class="icon-button">
                        <span style="font-size:14px;">CT</span>
                    </button>
                </div>
            </div>
        </div>
        <div style="grid-area:pro;margin-bottom: 16px">
            <div class="icon-label">PRO</div>
            <div class="icon-button-wrapper" style="border-radius: 8px;">
                <button class="icon-button">
                    <svg stroke="currentColor" fill="currentColor" 
                    stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z">    
                    </path>
                    </svg>
                </button>
            </div>
        </div>
        <div style="grid-area:view;margin-bottom: 16px">
            <div class="icon-label">VIEW</div>
            <div class="icon-button-wrapper-group">
                <div class="icon-button-wrapper rounded-top" style="border-bottom:none">
                    <button class="icon-button">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" 
                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 117.66v346.32c0 11.32 11.43 19.06 21.94 14.86L160 416V32L20.12 87.95A32.006 32.006 0 0 0 0 117.66zM192 416l192 64V96L192 32v384zM554.06 33.16L416 96v384l139.88-55.95A31.996 31.996 0 0 0 576 394.34V48.02c0-11.32-11.43-19.06-21.94-14.86z">
                        </path>
                        </svg>
                    </button>
                </div>
                <div class="icon-button-wrapper rounded-bottom">
                    <button class="icon-button">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" 
                        height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M48 48a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm0 160a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm0 160a48 48 0 1 0 48 48 48 48 0 0 0-48-48zm448 16H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z">
                        </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div> -->
        <div style="grid-area:reset">
                <div class="icon-button-wrapper" style="border-radius: 8px;">
                <button class="icon-button icon-reset" @click="getPosByMapNameAndBombIDFilter(mapName,1)">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" 
                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M212.333 224.333H12c-6.627 0-12-5.373-12-12V12C0 5.373 5.373 0 12 0h48c6.627 0 12 5.373 12 12v78.112C117.773 39.279 184.26 7.47 258.175 8.007c136.906.994 246.448 111.623 246.157 248.532C504.041 393.258 393.12 504 256.333 504c-64.089 0-122.496-24.313-166.51-64.215-5.099-4.622-5.334-12.554-.467-17.42l33.967-33.967c4.474-4.474 11.662-4.717 16.401-.525C170.76 415.336 211.58 432 256.333 432c97.268 0 176-78.716 176-176 0-97.267-78.716-176-176-176-58.496 0-110.28 28.476-142.274 72.333h98.274c6.627 0 12 5.373 12 12v48c0 6.627-5.373 12-12 12z">
                    </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import {EventBus} from "../EventBus";
export default {
    data(){
        return{
            results: [],
            
        }
    },
    props: {
        mapName:String
    },
    methods: {
        getPosByMapNameAndBombIDFilter: function(mapname,bombid){
            EventBus.$emit("map-name-bomb-id",mapname,bombid);
        }
    },
}

</script>

