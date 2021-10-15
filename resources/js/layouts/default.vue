<template>
    <div class="LayoutDefault">
        <Header></Header>
        <MapNavigator></MapNavigator>
        <main>
            <slot>

            </slot>
        </main>
    </div>
</template>

<script>
import Header from '~/components/common/Header.vue'; 
import MapNavigator from '~/components/common/MapNavigator.vue'; 
export default{
    name: "LayoutDefault",
    middleware: ["auth"],
    components: {
        Header,
        MapNavigator,
        // NadeFilter,
        // Sidebar
    }
}
</script>