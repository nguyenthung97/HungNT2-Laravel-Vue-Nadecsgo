<!--
    - Đây là file Vue con sử dụng slot để chèn nội dung từ component cha vào component con
    - Trang web sẽ sử dụng các slot để cấu thành layout
    - Không giống App.vue sử dụng dynamic layout, đây sử dụng static layout, tức là đây là layout chỉ thay đổi từng component thôi
    - Chỉ render phần router view thôi
-->

<template>
    <transition name="fade" mode="out-in">
        <slot>
            <router-view></router-view>
        </slot>
    </transition>
</template>

<script>
export default {
    name:'child'
};
</script>


