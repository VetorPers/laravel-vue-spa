<template>
    <a class="button" style="width: 100px" v-text="text" :class="[{'is-success':!followed},{'is-light':followed}]"
       v-on:click="follow"></a>
</template>

<script type="text/ecmascript-6">
    export default{
        props: ['question'],
        mounted(){
            axios.get('/api/question/followers/' + this.question).then(res => {
                this.followed = res.data.followed;
            })
        },
        data(){
            return {
                followed: false,
            }
        },
        methods: {
            follow(){
                axios.post('/api/question/followers', {'question': this.question}).then(res => {
                    this.followed = res.data.followed;
                });
            },
        },
        computed: {
            text(){
                return this.followed ? '正在关注' : '关注问题';
            }
        },
    }
</script>
