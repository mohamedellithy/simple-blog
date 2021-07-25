<template lang="pug">
    <div class="col-lg-12">
        <div class="sidebar-item recent-posts">
            <div class="sidebar-heading">
                <h2>Recent Posts</h2>
            </div>
            <div class="content">
                <ul>
                    <li v-for="post in posts" :key="post.id">
                        <router-link :to="{ path : '/single-post/'+post.id }" tag="a">
                            <h5>{{ post.title }}</h5>
                            <span>{{ post.publish_data }}</span>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
//
export default {
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
