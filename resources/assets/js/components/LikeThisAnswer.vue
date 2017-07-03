<template>
    <a v-text="text" v-on:click="follow" :class="[{'no-like-a':followed}]">赞</a>
</template>

<script type="text/ecmascript-6">
    export default{
        props: ['answer'],
        mounted(){
            axios.get('/api/answer/followers/' + this.answer).then(res => {
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
                axios.post('/api/answer/followers', {'answer': this.answer}).then(res => {
                    this.followed = res.data.followed;
                });
            },
        },
        computed: {
            text(){
                return this.followed ? '已赞' : '赞';
            }
        },
    }
</script>
