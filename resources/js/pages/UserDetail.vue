<template>
    <!-- eslint-disable -->
    <main>
        <div class="user-container">
            <div class="user-details-wrapper">
                <div class="user-details">
                    <h1>
                        <img :src="user.avatar" />
                        <a :href="userSteamCommunityLink" target="_blank">{{
                            user.name
                        }}</a>
                    </h1>
                    <div class="member_since">
                        <span style="font-weight: 200; font-size: 16px"
                            >Member since: &nbsp; &nbsp;{{
                                moment(user.created_at).format(
                                    "DD-MM-YYYY k:mm:ss"
                                )
                            }}</span
                        >
                        <br />
                        <span style="font-weight: 200; font-size: 16px"
                            >Last active: &nbsp; &nbsp;{{
                                moment().from(user.last_seen)
                            }}</span
                        >
                    </div>
                    <br />
                    <button class="btn-edit-profile">
                        <span class="btn-icon">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="btn-label">Edit user profile</span>
                    </button>
                </div>
            </div>
            <div class="user-nades">
                <h2>Nades by {{ user.name }}</h2>
                <div class="user-nade-map-nav">
                    <button
                        class="user-map-nav-item"
                        v-for="map in maps"
                        :key="map.id"
                        @click="getChildVideo($route.params.usersteamid,map.id,map.MapName.toString())"
                    >
                        <span class="nav-icon">
                            <div
                                style="
                                    display: block;
                                    overflow: hidden;
                                    position: absolute;
                                    top: -5px;
                                    left: 0;
                                    bottom: 0;
                                    right: 0;
                                    box-sizing: border-box;
                                    margin: 0;
                                "
                            >
                                <img
                                    :src="'/image/maps-icons/' + map.MapName + '.png'"
                                    width="20"
                                    height="20"
                                />
                            </div>
                        </span>
                        {{ map.MapName }}
                    </button>
                </div>
                <div id="video-grid">
                    <user-video-list-component :steam-id="$route.params.usersteamid" :user-name="user.name" ref="child"></user-video-list-component>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
export default {
    data() {
        return {
            results: [],
            maps: [],
            user: {},
        };
    },
    created() {
        this.getUser(this.$route.params.usersteamid);
        this.getAllMap();
        
    },

    methods: {
        getVideos: function (steamid, mapid) {
            var url = "/api/users/" + steamid + "/" + mapid;
            axios
                .get(url, {mapid: this.mapid })
                .then((response) => {
                    this.results = response.data;
                    console.log(this.results)
                });
        },
        getUser: function (steamid) {
            var url = "/api/users/" + steamid;
            axios.get(url).then((response) => {
                this.user = response.data;
            });
        },
        getAllMap: function () {
            var url = "/api/getAllMap";
            axios.get(url).then((response) => {
                this.maps = response.data;
            });
        },
        getChildVideo: function(userSteamId,mapId,mapName){
            this.$refs.child.getVideos(userSteamId,mapId,mapName);
        }
    },
    computed: {
        userSteamCommunityLink() {
            return (
                "https://steamcommunity.com/profiles" +
                this.$route.params.usersteamid
            );
        },
    },
};
</script>
<style scoped>
.user-container {
    position: relative;
    flex-direction: row;
    min-height: 60vh;
    display: flex;
}

.user-details-wrapper {
    display: inline-block;
    margin-bottom: 30px;
    /* max-width: 300px; */
    margin-right: 16px;
    position: sticky;
    top: 75px;
    align-self: flex-start;
    width: 400px
}

.user-details {
    background: #f5f5f5;
    margin-right: 18px;
    padding: 12px;
    width: 100%;
    border: 1px solid rgba(0, 0, 0, 0.1);
    align-self: flex-start;
    border-radius: 5px;
}

.user-details h1 {
    display: flex;
    align-items: center;
    font-size: 1.2em;
    color: #424242;
}

.user-details h1 img {
    border-radius: 50%;
    width: 30px;
    margin-right: 12px;
}

.member-since {
    margin-top: 10px;
    margin-bottom: 30px;
    padding-bottom: 30px;
    color: #424242;
}

.btn-edit-profile {
    align-items: center;
    appearance: none;
    background: rgb(50, 82, 168);
    border-radius: 5px;
    border: none;
    cursor: pointer;
    display: flex;
    margin: 0px;
    overflow: hidden;
    padding: 0px;
    transition: background 0.15s ease 0s;
    width: 100%;
}

.btn-icon {
    align-items: center;
    background: rgb(40, 72, 158);
    border-right: 1px solid rgb(30, 62, 148);
    color: white;
    display: flex;
    font-size: 16px;
    height: 40px;
    justify-content: space-around;
    transition: background 0.15s ease 0s;
    width: 40px;
}

.btn-label {
    color: white;
    display: block;
    flex: 1 1 0%;
    font-size: 14px;
    font-weight: 400;
    text-align: center;
    width: 100%;
}

.user-nades {
    flex: 1;
}

h2 {
    font-weight: 300;
    color: #424242;
    font-size: 32px !important;
    margin-bottom: 32px;
    margin-top: 0px !important;
    font-weight: -100 !important;
}

.user-nade-map-nav {
    display: flex;
    margin-bottom: 16px;

}

.user-map-nav-item {
    padding: 0px 10px;
    height: 40px;
    display: flex;
    background: rgb(255, 255, 255);
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    border-left: 1px solid rgba(0, 0, 0, 0.1);
    border-image: initial;
    cursor: pointer;
    border-right: none;
    align-items: center;
    transition: background 0.2s ease 0s;
}

.user-map-nav-item:first-child {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

.user-map-nav-item:last-child {
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    border-right: 1px solid rgba(0, 0, 0, 0.1);
}

.nav-icon {
    display: block;
    width: 20px;
    height: 20px;
    position: relative;
    margin-right: 4px;
}

.empty-list {
    background: rgb(237, 147, 2);
    border-radius: 5px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    color: white;
    font-size: 16px;
    font-weight: 400;
    padding: 16px;
}

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

</style>
