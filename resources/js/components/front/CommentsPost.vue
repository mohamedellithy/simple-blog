<template>
    <div class="col-lg-12">
        <div class="sidebar-item comments">
            <div class="sidebar-heading">
                <h2>{{ count_comments }} comments</h2>
            </div>
            <div class="content">
                <ul>
                    <li  v-for="comment in comments" :key="comment.id">
                        <div class="author-thumb">
                            <img src="assets/images/comment-author-01.jpg" alt="">
                        </div>
                        <div class="right-content">
                            <h4>{{ comment.commenter_name }}<span>{{ comment.publish_data }}</span></h4>
                            <p>{{  comment.comment_content  }}</p>
                        </div>
                        <ul class="replay-comments">
                            <li class="replied" v-for="Reply in comment.child_comment" :key="Reply.id">
                                <div class="author-thumb">
                                    <img src="assets/images/comment-author-02.jpg" alt="">
                                </div>
                                <div class="right-content">
                                    <h4>{{ Reply.commenter_name }}<span> {{ Reply.publish_data }}</span></h4>
                                    <p> {{ Reply.comment_content }}</p>
                                </div>
                            </li>
                        </ul>
                        <a @click="btnReplay(comment)" class="btn btn-default btn-replay" type="button">Replay</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sidebar-item submit-comment" v-if="Replay_on_comment_id == ''">
            <div class="sidebar-heading">
                <h2>Your comment</h2>
            </div>
            <div class="content">
                <form id="comment" @submit.prevent="AddComment()">
                    <div class="row">
                        <div class="col-md-6 col-sm-12"  v-if=" this.fields.name !=  'admin' ">
                            <fieldset>
                                <input name="name" v-model="fields.name" type="text" id="name" placeholder="Your name" required="">
                            </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12"  v-if=" this.fields.name !=  'admin' ">
                            <fieldset>
                                <input name="email" v-model="fields.email" type="text" id="email" placeholder="Your email" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <textarea name="comment" v-model="fields.comment" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Submit</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="sidebar-item submit-comment" v-else>
            <div class="sidebar-heading">
                <h2>Relplay on comment ( {{ Replay_on_comment_name }} )</h2>
                 <a @click="NewComment()" class="btn btn-info btn-replay" type="button">New Comment</a>
            </div>
            <div class="content">
                <form id="comment" @submit.prevent="AddComment()">
                    <div class="row">
                        <div class="col-md-6 col-sm-12" v-if=" this.fields.name !=  'admin' ">
                            <fieldset>
                                <input name="name" v-model="fields.name" type="text" id="name" placeholder="Your name" required="">
                            </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12" v-if=" this.fields.name != 'admin' ">
                            <fieldset>
                                <input name="email" v-model="fields.email" type="text" id="email" placeholder="Your email" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <textarea name="comment" v-model="fields.comment" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Submit</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>
<script >


export default {
    props: ['comments','count_comments'],
    data:function(){
        return{
           Replay_on_comment_id : '',
           Replay_on_comment_name:'',
           fields:{},
        }
    },
    created:function(){
        let self = this;
        if(Authentication.admin == 1){
            this.fields.commentor = 1;
            this.fields.name      = 'admin';
            this.fields.email     = 'admin@admin.com';
        }
    },
    methods:{
        btnReplay:function(replaycomment){
           this.Replay_on_comment_id   = replaycomment.id;
           this.Replay_on_comment_name = replaycomment.commenter_name;
           // location.href = '#comment';
           document.querySelector('#comment').scrollIntoView({
               behavior: 'smooth'
           });
        },
        AddComment:function(){
            let self = this;
            if(this.Replay_on_comment_id)
                this.fields.parent_comment = this.Replay_on_comment_id;

            this.fields.post_id  = this.$route.params.id;

            axios.post('/comments',this.fields).then(function(response){

               if( response.data.data.parent_comment ){
                    for(let i = 0; i < self.comments.length; i++){
                        if(self.comments[i].id == response.data.data.parent_comment){
                            self.comments[i].child_comment.push(response.data.data);
                        }
                    }
                }
                else if( response.data.data.parent_comment == null ){
                    self.comments.push(response.data.data);
                }

            }).catch(function(response){

            })
            this.count_comments++;
        },
        NewComment:function(){
            if(this.fields.name != 'admin')
                this.fields = {};

            this.Replay_on_comment_id ='';
        }
    },

}
</script>
<style>

  .replay-comments li ,
  .blog-posts .comments ul li.replied{
      padding-left:1px !important;
      width:100%;
  }
  .replay-comments{
      padding: 20px;
      margin-left: 50px;
  }
  .blog-posts .comments ul li{
      width:100%;
  }
  .btn-replay{
      float:right;
  }
</style>

