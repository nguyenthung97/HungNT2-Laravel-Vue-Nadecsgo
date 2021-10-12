<template>
    <!-- eslint-disable -->
        <div id="wrapper" style="position:absolute;inset:0;z-index:800; background:transparent; border-radius:8px; margin-top:10px; overflow:hidden; pointer-events:none;">
            <div id="video-grid-view" :style="[gridActive? {opacity:1, transform: 'translateY(0%)'} : {opacity:0, transform: 'translateY(-100%)'}]" style="opacity:1; transform: translateY(0%) translateZ(0px); width:100%;height:100%; overflow:hidden; pointer-events: auto">
                <div class="bg" style="position:absolute;inset:0; background: white; opacity:0.9; border-radius: 8px; border: 1px solid rgba(256,256,256); ">
                </div>
                
                <div id="video-grid" style="position:absolute;inset:0;overflow-y:auto;pointer-events:auto">
                    <div class="title" style='display:grid; grid-template-columns: 1fr 1fr 1fr; grid-template-areas: " msg . close"; padding: 8px;'>
                        <div class="close-btn" style="display: flex; grid-area: close; justify-self:end; font-size:24px; cursor:pointer; background: rgba(255,255,255,0.9); border-radius: 50%; width: 36px; height: 36px; align-items:center; justify-content:center; margin: 10px;" @click="gridActive = !gridActive">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div id="video-list-wrap">
                        <div class="video-list">
                            <div class="video-item" v-for="(video,id) in videoResults" :key="video.id">
                                <div class="nadebox-wrap">
                                    <div class="nade-box">
                                        <a :href="'/nades/' + video.slug" @click="passVideoId(video.id)" target="_blank">
                                            <div class="title">
                                                <h3 class="title-text">
                                                    <span class="main-title">
                                                        {{ video.PosName + " " + video.BombName }}
                                                    </span>
                                                    <span class="sub-title">
                                                        {{ "from " + video.VideoName }}
                                                    </span>
                                                </h3>
                                            </div>
                                            <div class="video">
                                                <div class="player">
                                                    <div class="front">
                                                        <div class="thumb-img">
                                                            <div class="result-img">
                                                                <div class="img-wrap">
                                                                    <img
                                                                        :src="
                                                                            video.ResultImagePath
                                                                        "
                                                                        class="images"
                                                                    />
                                                                </div>
                                                            </div>
                                                            <div class="lineup-border"></div>
                                                            <div class="lineup-img">
                                                                <div class="img-wrap">
                                                                    <img
                                                                        :src="
                                                                            video.LineUpImagePath
                                                                        "
                                                                        class="images"
                                                                    />
                                                                </div>
                                                                <div class="crosshair">
                                                                    <svg
                                                                        viewBox="0 0 43 44"
                                                                        width="20"
                                                                        height="21"
                                                                    >
                                                                        <path
                                                                            d="M19.5 27.5h4v16h-4zM19.5.5h4v16h-4zM16.5 20v4H.5v-4zM42.5 20v4h-16v-4z"
                                                                            fill="#fff"
                                                                            stroke="#000"
                                                                        ></path>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="back">
                                                        <div class="video-preview">
                                                            <iframe
                                                                :src="
                                                                    getIframeLink(
                                                                        video.VideoPath
                                                                    ) + '?controls=0&&speed=2'
                                                                "
                                                                frameborder="0"
                                                                style="width:100%;height:100%;position:absolute;top:0,left:0"
                                                            >
                                                            </iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="item-bottom" style="margin: 3px">
                                            <div class="stats">
                                                <div class="stat-item">
                                                    <div class="stat-view">
                                                        <i class="fas fa-eye"></i>
                                                        <div class="stat-count">
                                                            {{ video.views }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="stats">
                                                <div class="stat-item">
                                                    <div class="stat-favorite">
                                                        <i class="fas fa-star"></i>
                                                        <div class="stat-count">
                                                            {{ video.favorites }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
</template>

<script>
import {EventBus} from "../../EventBus";
export default {
    data() {
        return {
            videoResults: [],
            gridActive: false,
        };
    },
    created() {
        EventBus.$on("position-id", data =>{
            this.getVideoByPosID(data);
        });
    },
    methods: {
        getVideoByPosID: function (posId) {
            var url = "/getVideos/" + posId;
            axios.get(url, { posId: this.posId }).then((response) => {
                this.videoResults = response.data;   
                this.gridActive = true;
            });
        },
        getIframeLink: function (link) {
            var linkGenerate = link.slice(0, 19) + "ifr" + link.slice(18);
            return linkGenerate; 
        },
        passVideoId: function(videoId){
           console.log('Video ID: ',videoId )
           this.$store.dispatch('truyenVideoId', videoId).then(response => {
               console.log(response)
           })
        }
    },
    
};
</script>


