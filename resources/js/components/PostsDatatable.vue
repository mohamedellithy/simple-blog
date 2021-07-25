<template>
    <div class="col-xs-12 col-sm-12">
       <table id="example2" class="table table-bordered table-hover">
            <thead>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>

                  </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>

                  </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
export default{
    data:function(){
        return{
            posts:[],
        }
    },
    created:function(){
       let self      = this;
       let row_posts ="";
       jQuery(function () {
            row_posts = jQuery('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });

        });
        axios.get('/posts').then(function(response){
            self.posts = response.data.data;
            console.log(response);
            self.posts.map(function(value,key){
                row_posts.row.add([
                    value.id,
                    "<img class='img-post' src='"+value.image+"' />",
                    value.title,
                    value.excerpt
                ]).draw( false );;
            })
       }).catch(function(response){

       });

   }
}
</script>
<style>
 .img-post{
     width:100px;
 }
 #example2
 {
    background-color: white;
    padding: 26px;
 }
</style>
