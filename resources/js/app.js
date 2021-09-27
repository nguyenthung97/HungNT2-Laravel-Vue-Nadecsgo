require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all');
import Vue from 'vue';
window.Vue = require('vue').default;

Vue.component('user-detail', require('./components/UserDetail.vue').default);
Vue.component('pos-view-component', require('./components/PosView.vue').default);
Vue.component('video-nade-list-component', require('./components/VideoNadeList.vue').default);
Vue.component('signin-modal-component', require('./components/SignInModal.vue').default);
export const page = new Vue({
    el: '#page',
    methods: {
        getChildVideos : function(steamid, mapid,mapName){
            this.$refs.child.getVideos(steamid,mapid,mapName);
        },


    }
})
