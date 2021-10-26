<template>
    <div class="LayoutNoSidebar">
        <Header></Header>
        <MapNavigator></MapNavigator>
        <slot>
        </slot>
    </div>
</template>

<script>
import Header from '~/components/common/Header.vue'; 
import MapNavigator from '~/components/common/MapNavigator.vue';
export default{
    components: {
        Header,
        MapNavigator
    }
}
</script>