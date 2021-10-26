require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all');
import Vue from 'vue';
import store from '~/store/index.js'
import router from '~/router/index.js';
import App from '~/App.vue';
import moment from 'moment';
window.Vue = require('vue').default;
Vue.prototype.moment = moment
/* 
    import Layout 
*/
import DefaultLayout from "~/layouts/default.vue";
import NoSidebarLayout from "~/layouts/noSidebar.vue"
import OnlyHeaderLayout from "~/layouts/onlyHeader.vue"
Vue.component('default-layout', DefaultLayout);
Vue.component('no-sidebar-layout', NoSidebarLayout);
Vue.component('only-header-layout',OnlyHeaderLayout);
/* declare Component */

// Vue.component('user-detail', require('./components/elements/UserDetail.vue').default);
Vue.component('nade-filter-component', require('./components/elements/NadeFilter.vue').default);
Vue.component('pos-view-component', require('./components/elements/PosView.vue').default);
Vue.component('video-nade-list-component', require('./components/elements/VideoNadeList.vue').default);
Vue.component('signin-modal-component', require('./components/elements/SignInModal.vue').default);
Vue.component('sidebar-component',require('./components/elements/Sidebar.vue').default);
Vue.component('user-video-list-component', require('./components/elements/UserVideoList').default)
export const page = new Vue({
    store,
    router,
    render: h => h(App)
}).$mount("#app");
