
<template>
    
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
import { getIframeLink} from '../helpers/getData';
import {EventBus} from "../EventBus";
export default {
    data() {
        return {
            results: [],
            tabVideoSelected: true,    
            videoSlug: null,
        };
    },
    methods: {
        getVideoDetailBySlug: function (slug) {
            var url = "/getDetailBySlug/" + slug;
            axios.get(url, { slug: this.slug }).then((response) => {
                this.results = response.data;
            });
        },
        getIframeLink,
        getCurrentSlug: function(){
            var fullUrl = window.location.href;
            var currentSlug = fullUrl.slice(32);
            return this.videoSlug = currentSlug;
        }
    },
    created() {
        this.getCurrentSlug();
        this.getVideoDetailBySlug(this.videoSlug);
    },
};
</script>

<style></style>
