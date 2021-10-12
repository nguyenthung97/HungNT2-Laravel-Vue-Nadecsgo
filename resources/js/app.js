/* - Đây là file JS chính sẽ khởi tạo component gốc thành một phần trong trang index.blade.php
   - Ngoài ra nó sẽ giúp thêm vào các plugin và các component của bên thứ 3 
*/

require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all');
import Vue from 'vue';
import {store} from '../js/store/index';
import App from '../js/components/App'; 

import "./components";

window.Vue = require('vue').default;


// Vue.component('user-detail', require('./components/UserDetail.vue').default);
// Vue.component('nade-filter-component', require('./components/NadeFilter.vue').default);
// Vue.component('pos-view-component', require('./components/PosView.vue').default);
// Vue.component('video-nade-list-component', require('./components/VideoNadeList.vue').default);
// Vue.component('signin-modal-component', require('./components/SignInModal.vue').default);
// Vue.component('video-detail-component', require('./components/VideoDetail.vue').default);
// Vue.component('create-nade-component',require('./components/CreateNade.vue').default);
export const page = new Vue({
    // el: '#app',
    methods: {
        getChildVideos : function(steamid, mapid,mapName){
            this.$refs.child.getVideos(steamid,mapid,mapName);
        },
    },
    store,
    ...App      
})

