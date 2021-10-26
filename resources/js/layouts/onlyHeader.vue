<template>
    <div class="LayoutOnlyHeader">
        <HeaderWithTheBack></HeaderWithTheBack>
        <slot>
        </slot>
    </div>
</template>

<script>
import HeaderWithTheBack from '~/components/common/HeaderWithTheBack.vue'; 
export default{
    components: {
        HeaderWithTheBack
    }
}
</script>