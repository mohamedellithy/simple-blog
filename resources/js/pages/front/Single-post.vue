<template>
     <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img :src="post.image" alt="">
                    </div>
                    <div class="down-content">
                      <span v-for="cat in post.category" :key="cat.id">{{ cat.name + ' ' }}</span>
                      <a href="post-details.html"><h4>{{ post.title }}</h4></a>
                      <ul class="post-info">
                        <li><a href="#">{{ post.author }}</a></li>
                        <li><a href="#">{{ post.publish_data }}</a></li>
                        <li><a href="#">{{ post.count_comments   }} Comments</a></li>
                      </ul>
                      <p v-html="post.content"></p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li v-for="cat in post.category" :key="cat.id" ><a href="#">{{ cat.name + ',' }}</a></li>
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
                 <!--  comment -->
                 <comments-post :count_comments="post.count_comments" :comments="post.comments"></comments-post>

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

export default {
    data:function(){
        return{
            post:[],
            comments:[],
            count_comments:'',
        }
    },
    methods:{
       callPosts:function(post_id){
            let self = this;
            axios.get('/posts/'+post_id).then(function(response){
                self.post = response.data.posts;
            }).catch(function(response){

            });
       }
    },
    created:function(){
        this.callPosts(this.$route.params.id);
    },
    beforeRouteUpdate:function(to,from,next){
        this.callPosts(to.params.id);
        next();
    },
}
</script>
