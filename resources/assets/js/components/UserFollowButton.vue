<template>
    <a class="button" style="width: 100px" v-on:click="follow" v-text="text"
       :class="[{'is-success':!followed},{'is-light':followed}]">
        <span style="margin-right: 5px" class="icon"><i
                class="fa fa-plus"></i></span>
    </a>
</template>

<script type="text/ecmascript-6">
    export default{
        props: ['user'],
        mounted(){
            axios.get('/api/user/followers/' + this.user).then(res => {
                this.followed = res.data.followed;
//                this.getText();
            })
        },
        data(){
            return {
                followed: false,
//                text: '',
            }
        },
        methods: {
            follow(){
                let para = {'user': this.user};
                axios.post('/api/user/followers', {'user': this.user}).then(res => {
                    this.followed = res.data.followed;
//                    this.getText();
                });
            },
            getText(){
                this.text = this.followed ? '已关注' : '关注他';
            }
        },
        computed: {
            text(){
                return this.followed ? '已关注' : '关注他';
            }
        },
    }
</script>
