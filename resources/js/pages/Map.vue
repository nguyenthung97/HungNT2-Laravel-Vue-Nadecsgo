<template>
    <main>
        <div id="nade-page">
            <nade-filter-component
                :map-name="$route.params.mapname"
            ></nade-filter-component>
            <div id="nade-nades" style="grid-area: nades; width:100%; margin-top: 10px; flex:1 1 auto">
                <video-nade-list-component></video-nade-list-component>
                <div id="mapview-wrap">
                    <signin-modal-component></signin-modal-component>
                    <div id="mapview-absolute">
                        <div id="mapview-screen">
                            <div id="map-view" style="position: relative; overflow: hidden">
                                <img :src="mapImagePath" style=" border-radius: 8px; max-width: 100%; max-height: 100%;display: block;" id="mapoverlay" onclick="printMousePos(event)"/>
                                <pos-view-component :map-name="$route.params.mapname"></pos-view-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import NadeFilter from "~/components/elements/NadeFilter.vue";
import SignInModal from "~/components/elements/SignInModal.vue";
import PosView from "~/components/elements/PosView.vue";
import LayoutDefault from "~/layouts/default.vue";
export default {
    data() {
        return {
        mapImagePath: null,
        };
    },
    components: {
        NadeFilter,
        LayoutDefault,
        SignInModal,
        PosView,
    },
    methods: {
        getMap: function () {
            var url = "/api/getMap/" + this.$route.params.mapname;
            axios.get(url).then((response) => {
                this.mapImagePath = response.data.MapImagePath;
            });
        },
    },
    mounted() {
        this.getMap();
    },
};
</script>
