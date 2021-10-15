/* 
    - Đây là file Javascript khai báo global các component 
*/

import Vue from "vue";
import Child from "./Child.vue";

/*
 |--------------------------------------------------------------------------
 | Common
 |--------------------------------------------------------------------------
 */
import Header from "./common/Header";
import MapNavigator from "./common/MapNavigator";
import NadeFilter from "./common/NadeFilter";
import Sidebar from "./common/Sidebar"

/*
 |--------------------------------------------------------------------------
 | Elements
 |--------------------------------------------------------------------------
 */

// import CreateNade from './components/CreateNade.vue';
import PosView from '~/elements/PosView';
import SignInModal from '~/elements/SignInModal.vue';
import UserDetail from '~/elements/UserDetail.vue';
import VideoDetail from '~/elements/VideoDetail.vue';
import VideoNadeList from '~/elements/VideoNadeList.vue';
// Components that are registered global.

[
    Child, 
    Header,
    MapNavigator,
    NadeFilter,
    Sidebar,
    CreateNade,
    PosView,
    SignInModal,
    UserDetail,
    VideoDetail,
    VideoNadeList,

].forEach(Component => {
    Vue.component(Component.name, Component);
})