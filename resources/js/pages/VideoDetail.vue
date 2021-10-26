<template>
    <main>
        <div style="border-radius: 8px; border: 1px solid rgba(0, 0, 0, 0.3)">
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
                    <div
                        class="selected-bg"
                        :style="[
                            tabVideoSelected
                                ? ''
                                : { transform: 'translateX(100%)' },
                        ]"
                    >
                        <div class="selected-bg-fill"></div>
                    </div>
                    <button
                        class="tab-video tab-btn"
                        :class="[tabVideoSelected ? 'selected' : '']"
                        @click="tabVideoSelected = true"
                    >
                        VIDEO
                    </button>

                    <button
                        class="tab-lineup tab-btn"
                        :class="[tabVideoSelected ? '' : 'selected']"
                        @click="tabVideoSelected = false"
                    >
                        LINE UP
                    </button>
                </div>
                <div
                    class="media-container"
                    v-for="item in results"
                    :key="item.id"
                >
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
                                        <svg
                                            viewBox="0 0 43 44"
                                            width="43"
                                            height="44"
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
                    </div>
                </div>
            </div>
        </div>

        <div
            id="description"
            style="
                border-radius: 8px;
                background: white;
                border: none;
                margin-top: 16px;
                padding: 10px;
            "
        >
            <h3 style="font-size: 22px">Description</h3>
            <hr />
            <div>
                <div>
                    <p>
                        Simple throw with the lineup used to smoke off coffin
                        player and get some sort of one way if they decide to
                        get off and go to site, since the B site is elevated,
                        the T's will be seeing beneath the smoke and the CT
                        playing coffin will not be able to see them, thus making
                        it a one-way.
                    </p>
                </div>
            </div>
        </div>
        <div
            class="comments"
            style="
                border-radius: 8px;
                background: white;
                border: none;
                margin-top: 16px;
                padding: 10px;
            "
        >
            <form @submit.prevent="postComment" method="POST" id="comment_form">
                
                <div
                    class="form-group"
                    style="display: flex; flex-direction: column"
                >
                    <textarea
                        name="comment_message"
                        placeholder="Write a comment. It's a person on the other side, don't be too mean!"
                        v-model="fields.message"
                    ></textarea>
                    <button type="submit" id="submit-btn">SUBMIT</button>
                   
                    <input
                        type="hidden"
                        name="comment_sender_name"
                        v-model="fields.authUserName"/>
                    <input
                        type="hidden"
                        name="comment_sender_name"
                        v-model="fields.authUserAvatar"/>
                    <input
                        type="hidden"
                        name="video_id"
                        v-model="fields.videoId">
                </div>
            </form>
        </div>
        <br />
        <div id="display_comment" v-if="listComments">
            <div class="comment-wrapper" v-for="cmt in listComments" :key="cmt.id">
                <img class="comment-avatar" :src="cmt.comment_sender_avatar">
                <div class="comment-nickname-wrapper">
                    <div style="display:flex; align-items:center">
                        <a style="color: blue">{{cmt.comment_sender_name}}</a>
                    </div>
                </div>
                <div class="comment-body-wrapper">
                    <div style="display:flex; align-items:center">
                        <p>{{cmt.comment}}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import { getIframeLink } from "~/helpers/getData";
import { EventBus } from "~/EventBus";
export default {
    data() {
        return {
            fields: {
                videoId: '',
                authUserName: window.authUserName,
                authUserAvatar: window.authUserAvatar,
                message: null,
            },
            results: {},
            tabVideoSelected: true,
            videoSlug: null,
            listComments :[],
        };
    },
    methods: {
        getVideoDetailBySlug: function (slug) {
            var url = "/api/getDetailBySlug/" + slug;
            axios.get(url, { slug: this.slug }).then((response) => {
                this.results = response.data;
                this.fields.videoId = this.results[0].id;
               
            });
        },
        getIframeLink,
        getCurrentSlug: function () {
            var fullUrl = window.location.href;
            var currentSlug = fullUrl.slice(32);
            return (this.videoSlug = currentSlug);
        },
        postComment: function(){
            axios.post('/api/add-comment',{fields: this.fields})
            .then(response => {
                this.fields = {};
            
            })
        },
        getComment: function(videoId){
            var url ="/api/getCommentByVideoId/"+videoId
            axios.get(url)
            .then(response => {
                this.listComments = response.data;
                console.log(this.listComments)
            })
        }
    },
    created() {
        this.getCurrentSlug();
        this.getVideoDetailBySlug(this.videoSlug);
        this.getComment(this.fields.videoId);
    },
};
</script>

<style scope>
.nade-meta-data {
    background: rgb(114, 155, 121);
    display: flex;
    justify-content: space-around;
    border-top-left-radius: 8px
}

.nade-meta-data-item {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 10px
}

h4 {
    color: white;
    line-height: 11px;
    font-weight: 700;
    font-size: 12px;
    margin-bottom: 4px
}

span {
    /* color: white; */
    font-size: 14px
}

.tab-selector {
    display: flex;
    position: absolute;
    top: 10px;
    right: 10px;
    border-radius: 8px;
    border: 1px solid rgba(0, 0, 0, 0.3);
    z-index: 1;
    background: rgb(255, 255, 255);
    transition: all 0.2s ease 0s;
    overflow: hidden;
    width: 140px;
    height: 40px;
    padding: 2px;
}

#video-lineup-wrapper {
    position: relative;
    overflow: hidden;
    padding-bottom: calc(56.25% + 44px)
}

.selected {
    color: white !important;
}

.tab-btn {
    z-index: 3;
    background: transparent;
    cursor: pointer;
    outline: none;
    font-size: 12px;
    font-weight: 700;
    border-radius: 8px;
    flex: 1 1 0%;
    border: none;
    color: black;
}

.selected-bg {
    position: absolute;
    padding: 1px;
    z-index: 2;
    border-radius: 8px;
    inset: 0;
    width: 50%;
    transform: translateX(0px);
    transition: transform 0.15s ease 0s;
}

.selected-bg-fill {
    background: rgb(17, 17, 17);
    width: 100%;
    height: 100%;
    z-index: 3;
    border-radius: 8px;
    color: white;
}

.media-container {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.gfy-wrap {
    position: relative;
    padding-bottom: calc(56.25% + 44px);
    transform: scale(1.002);
    opacity: 1;
}

.lineup-tab {
    position: relative;
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.img-container {
    transition: transform 0.3s ease 0s;
    height: 100%;
}

.img-wrap {
    position: relative;
    height: 100%;
    transform: scale(1);
}

.crosshair {
    display: flex;
    align-items: center;
    inset: 0px;
    position: absolute;
    justify-content: center;
    transform: scale(0.5);
    transition: transform 0.3s ease 0s;
}

.video-lineup-img {
    position: absolute;
    inset: 0px;
    box-sizing: border-box;
    padding: 0px;
    border: none;
    margin: auto;
    display: block;
    width: 0px;
    height: 0px;
    min-width: 100%;
    max-width: 100%;
    min-height: 100%;
    max-height: 100%;
    object-fit: cover;
    object-position: center center;
}

.img-container:hover{
    transform: scale(2);
    transition: transform 0.3s ease 0s;
}

#submit-btn{
    align-self: flex-end;
    border: none;
    background: rgb(140, 192, 28);
    padding: 8px 12px;
    color: white;
    outline: none;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 6px;
    font-size: 14px;
    transition: background 0.15s ease 0s;
}

#submit-btn:disabled{
    background: rgb(128, 128, 128);
    cursor: not-allowed;
}

textarea{
    background: #fff;
    outline: none;
    min-height: 120px;
    resize: none;
    padding: 16px;
    border-radius: 5px;
    color: #424242;
    border: 1px dashed rgba(0, 0, 0, 0.1);
}

.comment-wrapper{
    display: grid;
    grid-template-columns: 60px 1fr;
    grid-column-gap: 10px;
    grid-template-areas:
        "avatar username"
        ". body ";
    color: rgb(66, 66, 66);
    width: 100%;
    margin-bottom: 16px;
}

.comment-avatar{
    position: relative;
    grid-area: avatar;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    
    margin-top: 8px;
}

.comment-nickname-wrapper{
    position: relative;
    grid-area: username;
    color: rgb(66, 66, 66);
    font-weight: 400;
    padding: 16px 16px 8px;
    border-top-left-radius: 8px;
    background: rgb(255, 255, 255);
    border: 1px solid rgba(0,0,0,0.1);    
}

.comment-body-wrapper{
    position: relative;
    grid-area: body;
    color: rgb(66, 66, 66);
    font-weight: 400;
    padding: 16px 16px 8px;
    border-bottom-left-radius: 8px;
    background: rgb(255, 255, 255);
    border: 1px solid rgba(0,0,0,0.1); 
}

.user-avatar-img{
    border-radius: 50%;
    margin: 0;
    padding:0;
}

</style>
