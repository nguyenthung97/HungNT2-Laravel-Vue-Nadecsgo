<template>
    <!--eslint-disable-->
    <main>
        <div
            class="guidelines-wrapper"
            style="color: rgb(66, 66, 66); margin: 10px"
        >
            <h2>Guidelines</h2>
            <div class="rules">
                <div class="req">
                    <h3 style="margin-bottom: 10px">General rules</h3>
                    <p>
                        <b>No Duplicates</b>
                        <br />
                        Make sure your not adding a nade that already is on the
                        site.
                        <br />
                        If your nade is thrown from a different position or
                        using a different line up, that is fine.
                    </p>
                    <p>
                        <b>Crosshair Visibility</b>
                        <br />
                        Make sure yourr crossshair is very visible in the video.
                        <br />
                        Many crosshairs become almost invisible after video
                        compression.
                        <br />
                        <br />
                        I recommend using the crosshair casters use for
                        professional live streams:
                    </p>
                    <p
                        style="
                            background-color: #e6e6e6;
                            border-radius: 3px;
                            padding-left: 6px;
                        "
                    >
                        CSGO-aNKFP-FzteR-6uRz5-4WP64-X6urD
                    </p>
                    <br />
                    <p style="font-style: italic">
                        Go into Settings and find the Crosshair section.
                        <br />
                        Click "Share or Import" and paste the code above.
                        <br />
                        Remember to backup your own by first clicking "Copy your
                        code" and paste it somewhere you can find it later.
                    </p>
                    <img
                        src="/image/exampleimg/crosshair_example.jpg"
                        style="
                            display: block;
                            max-width: 100%;
                            border-radius: 5px;
                            margin-top: 16px;
                        "
                    />
                </div>
                <div class="video-req">
                    <h2>Video requirements</h2>
                    <p>
                        - Aspect ratio 16:9
                        <br />
                        - Hide any clutter before recording
                    </p>
                    <p style="font-style: italic">
                        Use this command to only show your crosshair in the
                        video:
                    </p>
                    <p
                        style="
                            background-color: #e6e6e6;
                            border-radius: 3px;
                            padding-left: 6px;
                        "
                    >
                        cl_draw_only_deathnotices 1; net_graph 0;
                        r_drawviewmodel 1;
                    </p>
                    <p>Upload to Gfycat after recording and copy the link.</p>
                </div>
                <div class="screenshot-req">
                    <h2>Screenshots</h2>
                    <p>
                        You are going to need two images, one showing the end
                        result and one for how to line it up.
                    </p>
                    <table class="screenshot-table">
                        <tr>
                            <td width="50%">Result Image Example</td>
                            <td width="50%">Lineup Image Example</td>
                        </tr>
                        <tr>
                            <td>
                                <img
                                    src="/image/exampleimg/resultimgxamp.jpg"
                                    style="max-width: 100%; max-height: 100%"
                                />
                            </td>
                            <td>
                                <img
                                    src="/image/exampleimg/lineupimgxamp.jpg"
                                    style="max-width: 100%; max-height: 100%"
                                />
                            </td>
                        </tr>
                    </table>
                    <br />
                    <p>
                        To get take screenshots you have to hide everything on
                        screen. Paste the following command in your console:
                    </p>
                    <p
                        style="
                            background-color: #e6e6e6;
                            border-radius: 3px;
                            padding-left: 6px;
                        "
                    >
                        cl_drawhud 0; r_drawviewmodel 0; net_graph 0;
                    </p>
                    <br />
                    <p>Then to reset back to normal:</p>
                    <p
                        style="
                            background-color: #e6e6e6;
                            border-radius: 3px;
                            padding-left: 6px;
                        "
                    >
                        cl_drawhud 1; r_drawviewmodel 1;
                    </p>
                </div>
            </div>
        </div>

        <div id="page-wrap">
            <h2>Submit Nade</h2>

            <form
                ref="nadeSubmitForm"
                method="POST"
                @submit.prevent="submitNade"
                style="
                    margin: 0;
                    padding: 0;
                    display: inline;
                    background: inherit;
                "
            >
                <div id="create-nade-page">
                    <div id="infolabel" style="grid-area: info-label">
                        <h3>Information</h3>
                        <hr size="10" />
                    </div>
                    <div id="imglabel" style="grid-area: image-label">
                        <h3>Images</h3>
                        <hr />
                    </div>
                    <div id="map-select" style="grid-area: map-select">
                        <div class="label">MAP</div>
                        <div tabindex="0">
                            <select
                                id="mapselection"
                                name="mapselection"
                                v-model="fields.mapSelected"
                            >
                                <option value="" selected disable hidden>
                                    Select...
                                </option>
                                <option v-for="map in mapOptions" v-bind:value="{ value: map.value, text: map.text }">
                                    {{ map.text }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div
                        id="resultimg-select"
                        style="grid-area: resultimg-select"
                    >
                        <div class="label">RESULT IMAGE</div>
                        <button type="button" @click="showResultImg = true">
                            SET IMAGE (ONLY JPG)
                        </button>
                    </div>
                    <div id="overview-pos" style="grid-area: overview-pos">
                        <div class="label">OVERVIEW POSITION</div>
                        <button
                            type="button"
                            id="pos-sel"
                            :style= "fields.mapSelected? { cursor: 'pointer' , opacity:1 }:{cursor: 'not-allowed' ,opacity: 0.4}"
                            @click="showPositionModal = true"
                        >
                            SET OVERVIEW POSITION
                        </button>
                        <div class="position-modal" v-if="showPositionModal == true">
                            <div class="position-modal-content">
                                <div class="modal-title">
                                    Click on the map where the land nades
                                </div>
                                <div class="map-image" style="position: relative">
                                    <img style="height:400px;width:480px;margin-bottom: 8px" :src="'/image/maps-image/'+fields.mapSelected.text+'.jpg'" @click="choosePoint">
                                    <div class="point" v-if="hidePoint == false" :style="[hidePoint?'': {top: fields.pointCoordY +'px', left: fields.pointCoordX+'px'}]">

                                     </div>
                                </div>
                                <div class="position-modal-btns" style="display:flex">
                                    <button class="btn-cancel" type="button" @click="showPositionModal = false">Cancel</button>
                                    <button class="btn-save" type="button" :style="[showSaveButton? {opacity:1,cursor:'pointer' } : {opacity:0.5 ,cursor:'context-menu'}]" @click="showPositionModal = false ; showSaveButton = false">Save</button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="TopPosSelection" :value="fields.pointCoordY">
                        <input type="hidden" name="LeftPosSelection" :value="fields.pointCoordX">
                    </div>
                    <div
                        id="lineupimg-select"
                        style="grid-area: lineupimg-select"
                    >
                        <div class="label">LINEUP IMAGE</div>
                        <button type="button" @click="showLineupImg = true">
                            SET IMAGE (ONLY JPG)
                        </button>
                    </div>
                    <div id="type-select" style="grid-area: type-select">
                        <div class="label">TYPE</div>
                        <div tabindex="1">
                            <select
                                id="typeselection"
                                name="typeselection"
                                v-model="fields.typeSelected"
                            >
                                <option value="" selected disable hidden>
                                    Select...
                                </option>
                                <option v-for="nade of nadeOptions" v-bind:value="{ value: nade.value, text: nade.text }">{{ nade.text }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div id="metadata" style="grid-area: mtdt-label">
                        <br />
                        <h2>Meta Data</h2>
                        <hr />
                    </div>
                    <div id="video-select" style="grid-area: videourl-select">
                        <div class="label">GFYCAT VIDEO URL</div>
                        <div tabindex="2">
                            <input
                                id="videourlselection"
                                name="videourlselection"
                                type="text"
                                placeholder="Example: https://gfycat.com/confusedwiltedamazonparrot"
                                v-model="fields.videoSelected"
                            />
                        </div>
                    </div>

                    <div id="nadeend-location" style="grid-area: nadeend">
                        <div class="label">NADE END LOCATION</div>
                        <div tabindex="4">
                            <input
                                id="nade-end-input"
                                name="nade-end-input"
                                type="text"
                                placeholder="Example: XBox"
                                v-model="fields.thrownEndPosition"
                            />
                        </div>
                    </div>

                    <div id="thrownfrom-location" style="grid-area: thrownfrom">
                        <div class="label">THROWN FROM</div>
                        <div tabindex="6">
                            <input
                                id="thrown-from-input"
                                name="thrown-from-input"
                                type="text"
                                placeholder="Example: T Spawn"
                                v-model="fields.thrownFromPosition"
                            />
                        </div>
                    </div>

                    <div id="description" style="grid-area: desc">
                        <div
                            style="
                                color: #424242;
                                display: flex;
                                flex-direction: column;
                                margin-bottom: 20px;
                            "
                        >
                            <div class="label">Description</div>
                            <textarea
                                name="description"
                                placeholder="Write how to perform the throw. "
                            ></textarea>
                        </div>
                        <em>
                            <i
                                class="fas fa-check-circle"
                                fill="rgb(0,0,255)"
                            ></i>
                            <br />
                            <span
                                >Add a link to a video showing a pro CS:GO
                                player throwing this nade in the description.
                            </span>
                            <br />
                            Include timestamp if needed. <br />It has to be the
                            exact nade, or very very similar.</em
                        >
                    </div>
                    <div id="preview-label" style="grid-area: previewlabel">
                        <br />
                        <h2>Preview</h2>
                        <hr />
                    </div>
                    <div id="submit-button" style="grid-area: submit">
                        <button type="submit">SUBMIT</button>
                    </div>

                    <div id="preview" style="grid-area: preview">
                        <div class="nade-container">
                            <div class="title">
                                <h3 class="title-text">
                                    <span class="main-title">{{fields.typeSelected && fields.thrownEndPosition? fields.typeSelected.text+' '+fields.thrownEndPosition: 'No Title' }}</span>
                                    <span class="sub-title">{{fields.thrownFromPosition? 'from ' +fields.thrownFromPosition : '...'}}</span>
                                </h3>
                            </div>
                            <div class="player">
                                <div class="front">
                                    <div class="thumb-img">
                                        <div class="result-img">
                                            <div class="img-wrap">
                                                <img
                                                    class="images"
                                                    :src="resultImage"
                                                />
                                            </div>
                                        </div>
                                        <div class="lineup-border" v-if="lineupImage"></div>
                                        <div class="lineup-img" v-if="lineupImage">
                                            <div class="img-wrap">
                                                <img
                                                    class="images"
                                                    :src="lineupImage"
                                                />
                                            </div>
                                            <div class="crosshair" v-if="lineupImage">
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
                                        <input
                                            v-if="fields.resultImageToSave"
                                            type="hidden"
                                            name="result-img"
                                            v-model="fields.resultImageToSave"
                                        />
                                        <input
                                            v-if="fields.lineupImageToSave"
                                            type="hidden"
                                            name="lineup-img"
                                            v-model="fields.lineupImageToSave"
                                        />
                                    </div>
                                </div>
                                <div class="back" v-if="fields.videoSelected">
                                    <div class="video-preview">
                                        <iframe :src="getIframeLink(fields.videoSelected) +'?controls=0&&speed=2'"
                                            frameborder="0"
                                            style="width:100%;height:100%;position:absolute;top:0,left:0"
                                        >
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="items-bottom">
                                <div class="stats">
                                    <div class="stat-comment">
                                        <i class="fas fa-comment-dots"></i>
                                        <div class="stat-count">10</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input
                        type="hidden"
                        name="user_steam_id"
                        v-model="fields.authUserSteamId"
                    />
                    <div id="image-adder" v-if="showResultImg == true">
                        <div class="image-uploader">
                            <input
                                type="file"
                                hidden="true"
                                accept="image/*"
                                ref="resultImageInput"
                                @change="handleResultImage"
                            />
                            <div class="file-selector-btn">
                                <button
                                    class="btn-cancel"
                                    type="button"
                                    @click="showResultImg = false"
                                >
                                    Cancel
                                </button>
                                <button
                                    class="btn-select-img"
                                    type="button"
                                    @click="$refs.resultImageInput.click()"
                                >
                                    Upload image
                                </button>
                                <button
                                    class="btn-save"
                                    type="button"
                                    v-if="showSaveButton == true"
                                    @click="
                                        showResultImg = false;
                                        showSaveButton = false;
                                    "
                                >
                                    Save
                                </button>
                            </div>
                            <div
                                id="place-holder"
                                v-if="showPlaceHolder == true"
                            >
                                <div class="message">
                                    <div class="line-up-message">
                                        <h3>Guideline</h3>
                                        <ul>
                                            <li>Image must be 16:9 Ratio</li>
                                            <li>
                                                Remove your hud (cl_drawhud 0;
                                                r_drawviewmodel 0;)
                                            </li>
                                            <li>Take screenshot</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="img-crop">
                                <img
                                    id="resultImagePreview"
                                    :src="resultImage"
                                    v-if="resultImage"
                                />
                            </div>
                        </div>
                    </div>
                    <div id="lineup-adder" v-if="showLineupImg == true">
                        <div class="image-uploader">
                            <input
                                type="file"
                                hidden="true"
                                accept="image/*"
                                ref="lineupImageInput"
                                @change="handleLineUpImage"
                            />
                            <div class="file-selector-btn">
                                <button
                                    class="btn-cancel"
                                    type="button"
                                    @click="showLineupImg = false"
                                >
                                    Cancel
                                </button>
                                <button
                                    class="btn-select-img"
                                    type="button"
                                    @click="$refs.lineupImageInput.click()"
                                >
                                    Upload image
                                </button>
                                <button
                                    class="btn-save"
                                    type="button"
                                    v-if="showSaveButton == true"
                                    @click="showLineupImg = false"
                                >
                                    Save
                                </button>
                            </div>
                            <div
                                id="place-holder"
                                v-if="showPlaceHolder == true"
                            >
                                <div class="message">
                                    <div class="line-up-message">
                                        <h3>Guideline</h3>
                                        <ul>
                                            <li>Image must be 16:9 Ratio</li>
                                            <li>Aim at the position</li>
                                            <li>
                                                Remove your hud (cl_drawhud 0;
                                                r_drawviewmodel 0;)
                                            </li>
                                            <li>Take screenshot</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="img-crop">
                                <img
                                    id="lineupImagePreview"
                                    :src="lineupImage"
                                    v-if="lineupImage"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</template>
<script>
import {getIframeLink} from '~/helpers/getData.js'
export default {
    name: "createnade",
    data() {
        return {
            fields:{
                mapSelected: '',
                typeSelected: '',
                videoSelected: '',
                thrownFromPosition:'',
                thrownEndPosition:'',
                resultImageToSave: '',
                lineupImageToSave: '',
                pointCoordY: '',
                pointCoordX: '',
                authUserSteamId: window.authUserSteamId
            },
            resultImage: null,
            lineupImage: null,
            //show condition
            
            showResultImg: false,
            showLineupImg: false,
            showPlaceHolder: true,
            showSaveButton: false,
            showPositionModal : false,
            hidePoint : true,

            //declare options arrays
            mapOptions: [
                { text: 'Ancient', value: '9' },
                { text: 'Cache', value: '5' },
                { text: 'Dust2', value: '3' },
                { text: 'Inferno', value: '2' },
                { text: 'Mirage', value: '1' },
                { text: 'Nuke', value: '7' },
                { text: 'Overpass', value: '4' },
                { text: 'Train', value: '6' },
                { text: 'Vertigo', value: '8' }
            ],
            nadeOptions: [
                { text: 'Smoke', value: '1' },
                { text: 'Molotov', value: '2' },
                { text: 'Flash', value: '3' },
                { text: 'Grenade', value: '4' },
            ],
            
            
        };
    },
    methods: {
        handleResultImage: function (e) {
            this.showPlaceHolder = false;
            const file = e.target.files[0];
            this.resultImage = URL.createObjectURL(file);
            var reader = new FileReader;
            reader.readAsDataURL(file);
            reader.onloadend = () => {
                this.fields.resultImageToSave = reader.result;
            };
            this.showSaveButton = true;
        },
        handleLineUpImage: function (e) {
            this.showPlaceHolder = false;
            const file = e.target.files[0];
            var reader = new FileReader;
            reader.readAsDataURL(file);
            /*
            You are using a regular function as a callback which means this reference changes. 
            You need to use arrow function here . () => {}.
            */ 
            reader.onloadend =  () => {
                this.fields.lineupImageToSave = reader.result;
            };
            this.lineupImage = URL.createObjectURL(file);
            this.showSaveButton = true;
        },
        submitNade: function(){
            axios.post('/api/submit-nade',{fields: this.fields})
            .then(response => {
                this.fields = {};
                this.$refs.nadeSubmitForm.reset();
            })
        },
        choosePoint: function(e){
            this.fields.pointCoordY = e.offsetY;
            this.fields.pointCoordX = e.offsetX;
            this.hidePoint = false;
            this.showSaveButton = true;
        },
        getIframeLink,
    },
};
</script>
<style scoped>
    .front {
    inset: 0px;
    position: absolute;
    pointer-events: auto;
}

.back {
    opacity: 0;
    inset: 0px;
    position: absolute;
    pointer-events: all;
}

.front:hover {
    opacity: 0;
}

.back:hover {
    transition: ease-in-out 0.2s;
    opacity: 1;
}

.nadebox-wrap {
    display: inline-block;
    width: 100%
}

.nadebox {
    display: inline-block;
    background: rgb(250, 250, 250);
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    max-width: 400px;
    min-width: 265px;
    overflow: hidden;
    width: 100%;
    margin-bottom: -6px;
}

.title {
    background: rgb(250, 250, 250);
    color: rgb(66, 66, 66);
    overflow: hidden;
    position: relative;
}

.title-text {
    display: flex;
    flex-direction: column;
    font-size: 17px;
    grid-area: title / title / title / title;
    margin: 0px;
    padding: 0px;
}

.main-title {
    display: block;
    margin-bottom: 3px;
    padding-top: 5px;
    text-align: center;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.sub-title {
    display: block;
    font-size: 12px;
    opacity: 0.75;
    text-align: center;
    white-space: nowrap;
    padding-bottom: 5px;
}

.player {
    background: rgb(245, 245, 245);
    display: block;
    overflow: hidden;
    padding-top: 56%;
    position: relative;
    width: 100%;
}

.thumb-img {
    opacity: 1;
    height: 100%;
    position: relative;
    filter: brightness(1.1) saturate(120%) contrast(105%);
    transition: opacity 0.3s ease 0s
}

.result-img {
    height: 100%;
    transform: translateX(-17%);
    background: rgb(245, 245, 245);
    align-items: center;
    display: flex;
    justify-content: center;
    width: 100%
}

.images {
    max-height: 100%;
    min-height: 100%;
    min-width: 100%;
    position: absolute;
    inset: 0px;
    box-sizing: border-box;
    padding: 0px;
    border: none;
    margin: auto;
    display: block;
    max-width: 100%;
    object-fit: cover;
    width: 0px;
    height: 0px
}

.lineup-border {
    background: rgb(245, 245, 245);
    bottom: 0px;
    clip-path: polygon(10% 0%, 100% 0%, 100% 100%, 0% 100%);
    position: absolute;
    right: 0px;
    top: 0px;
    width: 40.5%
}

.lineup-img {
    bottom: 0px;
    clip-path: polygon(10% 0%, 100% 0%, 100% 100%, 0% 100%);
    position: absolute;
    right: 0px;
    top: 0px;
    width: 40%
}

.img-wrap {
    display: block;
    overflow: hidden;
    position: absolute;
    inset: 0px;
    box-sizing: border-box;
    margin: 0px;
}

.crosshair {
    display: flex;
    align-items: center;
    inset: 0px;
    position: absolute;
    justify-content: center
}

.items-bottom {
    display: flex;
    padding: 0px 10px;
    align-items: center;
    height: 35px
}

.stats {
    display: inline-flex;
    align-items: center;
    flex: 1 1 0%;
}

.stat-item {
    align-self: center;
    display: inline-flex;
    margin-right: 10px;
    align-items: center;
}


.stat-view,
.stat-favorite,
.stat-comment {
    display: inline-flex;
    align-items: center;
    font-size: 11px;
    line-height: 11px;
    height: 11px;
    font-weight: 400;
    color: rgb(128, 128, 128);
}

.stat-count {
    margin-left: 4px;
}

.specials{
    display: inline-flex;
    align-items:center;
    white-space: nowrap;
}
#video-list-wrap {
    margin: 8px;
}

.video-list {
    display: grid;
    gap: 16px;
    grid-template-columns: repeat(auto-fill, minmax(265px, 1fr));
}

.video-preview {
    position: relative;
    padding-bottom: calc(56.25% + 44px);
}

    h2,
    h3 {
        padding: 0px;
        margin: 0 0 16px;
    }

    h2 {
        font-size: 24px;
    }

    h3 {
        font-size: 22px;
    }

    .rules {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: min-content 1fr;
        gap: 16px;
        grid-template-areas:
            "req videoreq"
            "req ssreq"
    }

    .req,
    .screenshot-req,
    .video-req {
        padding: 16px;
        border-radius: 5px;
        background: #fafafa;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    p {
        font-size: 16px;
        margin-bottom: 6px;
    }

    b {
        font-weight: 700;
    }

    .req {
        grid-area: req;
    }

    .screenshot-req {
        grid-area: ssreq;
    }

    .video-req {
        grid-area: videoreq;
    }

    #app {
        display: grid;
        width: 100%;
        min-height: 100vh;
        grid-template-columns: 190px 1fr;
        grid-template-rows: 55px 1fr 1fr 345px;
        grid-gap: 16px;
        grid-template-areas:
            "header header"
            "nav main"
            "nav main"
            "nav main"
    }

    .screenshottable td {
        padding: 0 5px 5px 0;
        font-weight: 400;
    }

    #page-wrap {
        margin: 32px 16px 16px 16px;
    }

    #create-nade-page{
        border-radius: 5px;
        background: #fafafa;
        border: 1px solid rgba(0, 0, 0, 0.1);
        position: relative;
        display: grid;
        grid-gap: 10px 16px;
        padding: 16px;
        grid-template-columns: 1fr 300px;
        grid-template-areas: 
        "info-label image-label"
        "map-select resultimg-select"
        "overview-pos lineupimg-select"
        "type-select mtdt-label"
        "videourl-select team-select"
        "nadeend mvmt"
        "thrownfrom technique"
        ". tick"
        ". oneway"
        "desc previewlabel"
        "desc preview"
        "desc preview"
        ". submit";
    }

    .label{
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 5px;
        text-transform: uppercase;
        color: rgb(66, 66, 66);
    }

    select{
        width: 100%;
        border-radius: 3px;
        padding: 10px;
        font-size: 15px;
        line-height: 11px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        color: black;
        outline-color: rgba(0,0,255,0.3);
    }

    button{
        background: #545b69;
        width: 100%;
        border-radius: 3px;
        padding: 13px;
        font-size: 15px;
        line-height: 11px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        color: white;
        text-align: center;
        cursor: pointer;
    }

    input[type="text"]{
        width:100%;
        line-height: 15px;
        padding: 10px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        outline-color: rgba(0,0,255,0.3);
    }

    textarea{
        background: #fff;
    border-radius: 5px;
    border: 1px solid rgba(0,0,0,0.15);
    color: #424242;
    min-height: 200px;
    outline-color: rgba(0,0,255,0.3);
    padding: 15px;
    resize: none;
    }


    #image-adder ,#lineup-adder{
        inset:0;
        z-index: 1000;
        position: fixed;
        overflow-y: auto;
        background: rgba(0,0,0,0.9);
    }

    .file-selector-btn{
        margin-bottom: 12px;
        display: flex;
    }   

    .btn-cancel{
        background: rgb(192,28,28);
        color:white;
        opacity: 0.8;
        border: none;
        outline: none;
        font-size: 14px;
        cursor: pointer;
        margin-right: 16px;
        border-radius: 5px;
        height: 42px;
        padding: 0px 10px;
        width: 80px;
    }

    .btn-select-img{
        border: none;
        outline:none;
        font-size: 14px;
        background: rgb(84, 91, 105);
        cursor: pointer;
        margin-right: 16px;
        color: white;
        border-radius: 5px;
        height: 42px;
        padding: 0px 10px;
        width: 120px;
    }

    .btn-save{
        border: none;
        outline:none;
        font-size: 14px;
        background: rgb(148, 184, 59);
        cursor: pointer;
        margin-right: 16px;
        color: white;
        border-radius: 5px;
        height: 42px;
        padding: 0px 10px;
        width: 80px;
    }


    .image-uploader{
        padding-top: 16px;
        padding-bottom: 16px;
        display: block;
        width: 1264.81px;
        margin: 0px auto;
    }

    #place-holder{
        position: relative;
        width: 100%;
        padding-bottom: 56.25%;
        background: rgba(255, 255, 255, 0.5);
        margin-top: 20px;
        border-radius: 5px;
    }

    .message{
        position: absolute;
        inset:0;
        display: flex;
        align-items:center;
        justify-content: center;
    }

    .line-up-message{
        background: rgba(255, 255, 255, 0.8);
        color: rgb(17, 17, 17);
        border-radius: 5px;
        margin-bottom: 15px;
        padding: 10px;
    }

    ul{
        display: block;
        list-style-type: disc;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
    }

    .nade-container{
        background:#fff;
        border: 1px solid rgba(0,0,0,0.1);
        border-radius: 5px;
        overflow:hidden;
    }

    .position-modal{
        inset: 0px;
        position: fixed;
        z-index:999;
        background: rgba(0,0,0,0.9);
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .position-modal-content{
        background: white;
        border-radius:4px;
    }

    .modal-title{
        padding: 12px;
        font-size: 1.3em;
        text-align: center;
    }

    .point{
        position: absolute;
        border-radius: 50%;
        background: rgb(189, 235, 52);
        border: 1px solid black;
        width: 10px;
        height: 10px;
    }
</style>