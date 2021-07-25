<template>
    <carousel v-if="posts.length > 0" :autoplay="true" :dots="false" class="owl-banner ">
        <div class="item" v-for="post in posts" :key="post.id">
            <img :src="post.image" alt="">
            <div class="item-content">
                <div class="main-content">
                    <div class="meta-category">
                        <span>{{ post.category[0].name ? post.category[0].name : ''  }}</span>
                    </div>
                    <router-link :to="{ path : '/single-post/'+post.id }" :tag="a">
                        <h4>{{ post.title }}</h4>
                    </router-link>
                    <ul class="post-info">
                        <li><a href="#">{{ post.author }}</a></li>
                        <li><a href="#">{{ post.publish_data }}</a></li>
                        <li><a href="#">12 Comments</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </carousel>
</template>
<script>
import carousel from "vue-owl-carousel";
//
export default {
    components: {
       carousel
    },
    data:function(){
        return{
            posts:[],
        }
    },
    created:function(){
        let self = this;
        axios.get('/posts').then(function(response){
            self.posts = response.data.data;
            console.log(self.posts);
       }).catch(function(response){

       });
    },
}
</script>
