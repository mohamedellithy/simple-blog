<template>
    <section class="blog-posts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="all-blog-posts">
                            <div class="row">
                                <div class="col-lg-12" v-for="post in posts" :key="post.id">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                        <img :src="post.image" alt="">
                                        </div>
                                        <div class="down-content">
                                            <span>Lifestyle</span>
                                            <router-link  :to="{ path: 'single-post/'+ post.id }" tag="a"><h4>{{ post.title }}</h4></router-link>
                                            <ul class="post-info">
                                                <li><a href="#">{{ post.author }}</a></li>
                                                <li><a href="#">{{ post.published_at }}</a></li>
                                                <li><a href="#">12 Comments</a></li>
                                            </ul>
                                            <p> {{ post.excerpt }}</p>
                                            <div class="post-options">
                                                <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <li v-for="cat in post.category" :key="cat.id"><a href="#">{{ cat.name }}</a>,</li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="post-share">
                                                    <li><i class="fa fa-share-alt"></i></li>
                                                    <li><a href="#">Facebook</a>,</li>
                                                    <li><a href="#"> Twitter</a></li>
                                                    </ul>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <a href="blog.html">View All Posts</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="sidebar">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="sidebar-item search">
                                        <form id="search_form" name="gs" method="GET" action="#">
                                        <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                                        </form>
                                    </div>
                                </div>

                                <recent-posts></recent-posts>

                                <categories-list></categories-list>

                                <div class="col-lg-12">
                                    <div class="sidebar-item tags">
                                        <div class="sidebar-heading">
                                        <h2>Tag Clouds</h2>
                                        </div>
                                        <div class="content">
                                        <ul>
                                            <li><a href="#">Lifestyle</a></li>
                                            <li><a href="#">Creative</a></li>
                                            <li><a href="#">HTML5</a></li>
                                            <li><a href="#">Inspiration</a></li>
                                            <li><a href="#">Motivation</a></li>
                                            <li><a href="#">PSD</a></li>
                                            <li><a href="#">Responsive</a></li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</template>
<script >
import RecentPosts from './RecentPosts.vue';
export default {
  components: { RecentPosts },
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
