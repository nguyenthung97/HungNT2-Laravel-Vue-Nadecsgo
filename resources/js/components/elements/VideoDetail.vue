<template>
    <!-- <div>
        <div>Day la thu ta can: {{ videoidcanlay}}</div>
        <button @click="congVideoId">Cong 1</button>
        <button @click="truVideoId">Tru 1</button>
    </div> -->
    <div id="video-lineup-wrapper">
        
        <div class="tab-selector">
            <div class="selected-bg" :style="[tabVideoSelected?'':{transform:'translateX(100%)'}]">
                <div class="selected-bg-fill"></div>
            </div>
            <button
                class="tab-video tab-btn"
                :class="[tabVideoSelected? 'selected':'']"
                @click="tabVideoSelected = true"
            >
                VIDEO
            </button>

            <button
                class="tab-lineup tab-btn"
                :class="[tabVideoSelected? '':'selected']"
                @click="tabVideoSelected = false"
            >
                LINE UP
            </button>
        </div>
        <div class="media-container" v-for="item in results" :key="item.id">
            <div class="video-tab" v-if="tabVideoSelected">
                <div class="gfy-wrap">
                    <iframe
                        :src="
                            getIframeLink(item.VideoPath) +
                            '?controls=0&&speed=2'
                        "
                        frameborder="0"
                        style="width:100%;height:100%;position:absolute;top:0,left:0"
                    >
                    </iframe>
                </div>
            </div>
            <div class="lineup-tab" v-else>
                <div class="img-container">
                    <div class="img-wrap">
                        <div
                            style="
                                display: block;
                                overflow: hidden;
                                position: absolute;
                                inset: 0px;
                                box-sizing: border-box;
                                margin: 0px;
                            "
                        >
                            <img
                                class="video-lineup-img"
                                :src="item.LineUpImagePath"
                                decoding="async"
                                sizes="100vw"
                            />
                            <div class="crosshair">
                                <svg viewBox="0 0 43 44" width="43" height="44">
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
            </div>
        </div>
    </div>
</template>

<script>
import { getIframeLink} from '../../helpers/getData'
export default {
    data() {
        return {
            results: [],
            tabVideoSelected: true,    
            videoidcanlay: null,
        };
    },
    methods: {
        getVideoDetail: function (videoId) {
            var url = "/getDetail/" + videoId;
            axios.get(url, { videoId: this.videoId }).then((response) => {
                this.results = response.data;
                console.log(this.results)
            });
        },
        getIframeLink,
        setVideoId(){
            this.videoidcanlay = this.getvideoid;
            console.log(this.videoidcanlay)
        }
    },
    created() {
        console.log('Da vao')
        // console.log(this.$store.getters.getVideoId);
        this.setVideoId();
        this.getVideoDetail(this.videoidcanlay);
    },
    computed: {
        getvideoid() {
            console.log(this.$store)
            // return this.$store.state.videoidstate
        },
    }
};
</script>

<style></style>
