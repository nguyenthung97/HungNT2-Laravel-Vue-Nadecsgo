
<template>
    <div id="app">
        <component :is="layout" id="page">
            <router-view :key="$route.fullPath"></router-view>
            <router-view :key="$route.fullPath" name="subComponent1" ></router-view>
        </component>
    </div>
</template>

<script>
export default {
    name: 'app',
    data: () => ({
    
    }),
    computed: {
        layout(){
            return (this.$route.meta.layout || "default") + '-layout';
        }
    }
};
</script>
