<template>
    <div id="main">
        <transition name="fade"
                    mode="out-in">
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>
    export default {
        name: 'main',
        components: {
        }
    }

</script>

