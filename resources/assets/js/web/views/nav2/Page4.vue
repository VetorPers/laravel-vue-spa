<template>
    <div>
        <h1>vuex 测试</h1>
        Clicked: {{ getCount }} times
        <button @click="increment">+</button>
        <button @click="decrement">-</button>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        computed: {
                ...mapGetters([
                    'getCount'
                ])
    }
    ,
    methods: {
    ...mapActions([
            'increment',
            'decrement'
        ])
    }
    }
</script>
