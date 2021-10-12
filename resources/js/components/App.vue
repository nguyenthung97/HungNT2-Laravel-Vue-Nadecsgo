 <!--
   - Đây là file Vue gốc sẽ định dạng template cho page của mình 
   - Ở đây sẽ sử dụng component wrapper cho dynamic layout, tức là thay nguyên layout của trang luôn 
   VD: 
   Có 2 dạng layout :  
   + có trang sẽ có phần header, map nav , main, aside
   + có trang sẽ chỉ có header và main thôi 
 -->

<template>
    <div id="app">
        <transition :name="transitionName" mode="out-in">
            <component :is="layout" v-if="layout"></component>
        </transition>
    </div>
</template>

<script>

//load layout component dynamically
const requireContext = require.context("~/layouts", false, /.*\.vue$/);
const layouts = requireContext
        .keys()
        .map(file => [file.replace(/(^.\/)|(\.vue$)/g, ""), requireContext(file)])
        .reduce((components, [name, component]) => {
            components[name] = component.default || component;
            return components;
        }, {});

export default{
    el: '#app',
    components: {

    },
    data: () => ({
        layout: null,
        defaultLayout: "default",
        transitionName : "page"

    }),
    methods: {
         /**
         * Set the application layout.
         *
         * @param {String} layout
         */
        setLayout(layout){
            if(!layout || !layouts[layout]){
                layout = this.defaultLayout;
            }
            this.layout = layouts[layout];
        },
        setTransitionName(transitionName) {
            this.transitionName = transitionName;
        }
        
    }
}
</script>