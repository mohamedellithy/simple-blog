<template>
    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                <div class="row">
                    <div class="col-lg-6" v-for="post in posts" :key="post.id">
                        <div class="blog-post">
                            <div class="blog-thumb">
                            <img :src="post.image" alt="">
                            </div>
                            <div class="down-content">
                            <span>Lifestyle</span>
                            <router-link :to="{ path: '/single-post/'+ post.id }" tag="a"><h4>{{ post.title }}</h4></router-link>
                            <ul class="post-info">
                                <li><a href="#">{{ post.author }}</a></li>
                                <li><a href="#">{{ post.publish_data }}</a></li>
                                <li><a href="#">12 Comments</a></li>
                            </ul>
                            <p :inner-html.prop="post.excerpt | shortDescription"></p>
                            <div class="post-options">
                                <div class="row">
                                <div class="col-lg-12">
                                    <ul class="post-tags">
                                        <li><i class="fa fa-tags"></i></li>
                                        <li v-for="cat in post.category" :key="cat.id">
                                            <router-link :to="{ path : '/categories-page/'+cat.id }" :tag="a">{{ cat.name }}</router-link>,
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            </div>
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
import CategoriesList from '../../components/front/CategoriesList.vue';

export default {
  components: { CategoriesList },
    data:function(){
        return{
            posts:[],
        }
    },
    methods: {
        callCategories:function(category_id){
            let self = this;
            axios.get('/categories/'+category_id).then(function(response){
                self.posts = response.data.data;
            }).catch(function(response){

            });
        }
    },
    created:function(){
        this.callCategories(this.$route.params.id);
    },
    beforeRouteUpdate(to, from, next) {
        // Call the API query method when the URL changes
        this.callCategories(to.params.id);
        next()
    }
}
</script>
