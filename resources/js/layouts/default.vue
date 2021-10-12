<template>
    <div>
        <Header></Header>
        <MapNavigator></MapNavigator>
        <NadeFilter></NadeFilter>
        <Sidebar></Sidebar>
    </div>
</template>

<script>

import Header from ''; 

export default{
    name: "MainLayout",
    middleware: ["auth"],
    components: {
        Header,
        MapNavigator,
        NadeFilter,
        Sidebar
    }
}
</script>