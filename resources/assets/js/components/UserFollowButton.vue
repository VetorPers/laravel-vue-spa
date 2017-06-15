<template>
    <a class="button is-success" style="width: 100px" v-on:click="follow"><span
            style="margin-right: 5px"
            class="icon"><i
            class="fa fa-plus"></i></span>关注他</a>
</template>

<script type="text/ecmascript-6">
    export default{
        props: ['user'],
        mounted(){
            axios.get('/api/user/followers/' + this.user).then(res => {
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
                let para = {'user': this.user};
                axios.post('/api/user/followers', {'user': this.user}).then(res=> {
                    this.followed = res.data.followed;
                })
            },
        },
        computed: {}
    }
</script>
