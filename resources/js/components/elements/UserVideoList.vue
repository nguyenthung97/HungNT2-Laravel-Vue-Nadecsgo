<template>
    <div id="video-list-wrap" v-if="results.length != 0">
        <div class="video-list">
            <div class="video-item" v-for="item in results" :key="item.id">
                <div class="nadebox-wrap">
                    <div class="nadebox">
                        <router-link :to="'/nades/' + item.slug">
                            <div class="title">
                                <h3 class="title-text">
                                    <span class="main-title">
                                        {{ item.PosName + " " + item.BombName }}
                                    </span>
                                    <span class="sub-title">
                                        from
                                        {{ item.VideoName }}
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
                                                        class="images"
                                                        :src="
                                                            item.ResultImagePath
                                                        "
                                                    />
                                                </div>
                                            </div>
                                            <div class="lineup-border"></div>
                                            <div class="lineup-img">
                                                <div class="img-wrap">
                                                    <img
                                                        class="images"
                                                        :src="
                                                            item.LineUpImagePath
                                                        "
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
                                                    getIframeLink(item.VideoPath) + '?controls=0&&speed=2'
                                                "
                                                frameborder="0"
                                                style="width:100%;height:100%;position:absolute;top:0,left:0"
                                            >
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                        <div class="item-bottom" style="margin: 3px">
                            <div class="stats">
                                <div class="stat-item">
                                    <div class="stat-view">
                                        <i class="fas fa-eye"></i>
                                        <div class="stat-count">
                                            {{ item.views }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="stats">
                                <div class="stat-item">
                                    <div class="stat-favorite">
                                        <i class="fas fa-star"></i>
                                        <div class="stat-count">
                                            {{ item.favorites }}
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
    <div class="empty-list" v-else>
        {{ userName }} has no nades on {{ mapname }}
    </div>
</template>
<script>
import {getIframeLink} from '~/helpers/getData.js'
export default{
    data(){
        return{
            results: [],
            mapname: 'Mirage',
        }
    },
    props : {
        userName: String,
        steamId: String,
    },
    created(){
        this.getVideos(this.$route.params.usersteamid,1,this.mapname);
    },
    methods: {
        getVideos : function(steamId, mapId, mapName){
            var url = '/api/users/'+steamId+"/"+mapId
            axios.get(url)
            .then(response => {
                this.results = response.data
                console.log(this.results)
                this.mapname = mapName;
            })
        },
        getIframeLink
    }
}
</script>