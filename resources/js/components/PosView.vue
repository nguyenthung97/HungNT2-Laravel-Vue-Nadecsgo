<template>
    <!-- eslint-disable -->
    <div>
        <div id="svg-wrapper" v-for="item in results">
            <div v-if="item.bomb_id == '1'" :class="item.BombName" :style="{position: 'absolute', cursor: 'pointer', visibility: 'visible', top: item.posTop + 'px' , left: item.posLeft +'px'}" @click="getVideoByPosID(item.id)">
                <svg width="26" height="26" viewBox="0 0 100 100" fill="none">
                    <circle class="t-left" cx="50" cy="50" r="25" fill="#d9d9d9"></circle>
                    <circle class="t-right" cx="50" cy="50" r="25" fill="#d9d9d9"></circle>
                    <circle class="b-left" cx="50" cy="50" r="25" fill="#d9d9d9"></circle>
                    <circle class="b-right" cx="50" cy="50" r="25" fill="#d9d9d9"></circle>
                    <circle class="c-left" cx="50" cy="50" r="25" fill="#d9d9d9"></circle>
                    <circle class="c-right" cx="50" cy="50" r="25" fill="#d9d9d9"></circle>
                    <text x="50%" y="55%" class="count" v-if="item.counter > 0">{{item.counter}}</text>
                    <path d="M24.9696 73.8816C17.6107 66.4345 7.48676 47.0768 25.8624 29.2232C22.2943 35.5759 17.1204 53.4014 24.9696 73.8816Z" fill="white" opacity="0.4"></path>
                </svg>
            </div>
            <div v-else-if="item.bomb_id == '2'" :class="item.BombName" :style="{position: 'absolute', cursor: 'pointer', visibility: 'visible', top: item.posTop + 'px' , left: item.posLeft +'px'}" @click="getVideoByPosID(item.id)">
               <svg width="26" height="26" viewBox="0 0 100 100" fill="none">
                    <path d="M25.3982 48.7773C19.3236 45.1276 15.1936 28.4548 13.8879 20.5747C13.8893 19.9363 13.8938 19.2846 13.9016 18.6215C8.3084 27.1051 5 37.6095 5 48.9833C5 77.1591 25.3031 100 50.3483 100C75.3934 100 95.6965 77.1591 95.6965 48.9833C95.6965 36.7343 91.8594 25.4936 85.4636 16.6995C83.0925 27.4231 77.6266 34.0558 73.0224 37.9924C67.5367 14.5412 47.3277 4.2475 37.7941 0C41.9891 20.3651 32.1531 40.1073 25.3982 48.7773Z" fill="#CE1B1B"></path>
                   <text x="50%" y="55%" class="count" v-if="item.counter > 0">{{item.counter}}</text>
                </svg>
            </div>
            <div v-else-if="item.bomb_id== '3'" :class="item.BombName" :style="{position: 'absolute', cursor: 'pointer', visibility: 'visible', top: item.posTop + 'px' , left: item.posLeft +'px'}" @click="getVideoByPosID(item.id)">
                <svg width="26" height="26" viewBox="0 0 100 100" fill="none"><path d="M16 57L71 0L52.1429 57H16Z" fill="#464646"></path><path d="M85 44L31 100L49.5143 44H85Z" fill="#464646"></path><path d="M15 56L69 0L50.4857 56H15Z" fill="#FFD600"></path>
                    <path d="M84 44L29 100L47.8571 44H84Z" fill="#FFD600"></path>
                   <text x="50%" y="55%" class="count" v-if="item.counter > 0">{{item.counter}}</text>
                </svg>
            </div>
            <div v-else :class="item.BombName" :style="{position: 'absolute', cursor: 'pointer', visibility: 'visible', top: item.posTop + 'px' , left: item.posLeft +'px'}" @click="getVideoByPosID(item.id)">
                <svg width="26" height="26" viewBox="0 0 100 100" fill="none">
                    <path d="M50 0L56.75 39.1747L96.7654 25L63.5 50L96.7654 75L56.75 60.8253L50 100L43.25 60.8253L3.23463 75L36.5 50L3.23463 25L43.25 39.1747L50 0Z" fill="#CE1B1B"></path><path d="M50 14L54.75 42.2058L82.909 32L59.5 50L82.909 68L54.75 57.7942L50 86L45.25 57.7942L17.091 68L40.5 50L17.091 32L45.25 42.2058L50 14Z" fill="#AC1C1C"></path><path d="M39.4887 36.6548L31.1415 21.2571L17.0686 15.7767L39.4887 36.6548Z" fill="black"></path><path d="M39.2623 23.2713L35.6463 17.0083L38.2047 12.3997L39.2623 23.2713Z" fill="black"></path><path d="M60.4394 65.5175L67.7217 78.2732L79.6326 83.0121L60.4394 65.5175Z" fill="black"></path><path d="M59.3836 79.31L62.9996 85.573L60.4412 90.1816L59.3836 79.31Z" fill="black"></path>
                  <text x="50%" y="55%" class="count" v-if="item.counter > 0">{{item.counter}}</text>
                </svg>
            </div>
        </div>
    </div>
</template>

<script>
import {EventBus} from "../EventBus";
export default {
    data() {
        return {
            results: [],
        };
    },
    props: {
        mapName : String,
    },

    created(){
        this.getPosByMapNameAndBombID(this.mapName,1);
    },
    methods: {
        getPosByMapNameAndBombID: function (mapname, bombId) {
            var url = "/getPos/" + mapname + "/" + bombId;
            axios.get( url, { mapname: this.mapName, bombId: this.bombId })
            .then( response => {
                this.results = response.data;
                console.log(this.results)
                console.log(mapname);

                }
            );
        },
        getVideoByPosID: function(posId){
            EventBus.$emit("position-id", posId);
        },
    },
};
</script>
