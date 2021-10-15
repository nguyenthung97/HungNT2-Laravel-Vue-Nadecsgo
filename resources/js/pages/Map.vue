<template>
    <layout-default>
        <div id="nade-page">
            <nade-filter-component map-name="map.mapName"></nade-filter-component>
            <div id="mapview-wrap">
                    <signin-modal-component :is-guest="{{ json_encode(auth()->guest()) }}"></signin-modal-component>
                    
                    <div id="mapview-absolute">
                        <div id="mapview-screen">
                            <div id="map-view" style="position:relative;overflow:hidden">
                                <img src="map.MapImagePath" style="border-radius:8px;max-width:100%; max-height:100%; display:block" id="mapoverlay" onclick="printMousePos(event)">
                                <pos-view-component map-name="map.MapName"></pos-view-component>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </layout-default>
</template>
<script>
import NadeFilter from '~/components/elements/NadeFilter.vue';
import SignInModal from '~/components/elements/SignInModal.vue';
import PosView from '~/components/elements/PosView.vue';
import LayoutDefault from '~/layouts/default.vue';

export default{
    data(){
        return{
            map: null,
        }
    },
    components: {
        NadeFilter, 
        LayoutDefault,
        SignInModal,
        PosView
    },
    methods: {
        getMapName: function(){
            axios.get('/getMap/',this.$route.params.mapname)
            .then(response => {
                this.map = response.data;
            })
        }
    },
    created(){
        this.getMapName();
    }
}
</script>