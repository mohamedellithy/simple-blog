<template>
    <div class="col-xs-12 col-sm-12">
       <table id="example2" class="table table-bordered table-hover">
            <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                  </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                  </tr>
            </tfoot>
        </table>
    </div>
</template>

<script>
export default{
    data:function(){
        return{
            categories:[],
        }
    },
    created:function(){

        let self = this;
        let row_category = '';
        jQuery(function () {
            row_category = jQuery('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });

        });
        axios.get('/categories').then(function(response){
            self.categories = response.data.data;
            console.log(self.categories);
            self.categories.map(function(value,key){
                row_category.row.add([
                    value.id,
                    value.name,
                    value.description
                ]).draw( false );;
            })
        }).catch(function(response){});

   },
   mounted:function(){
   }
}
</script>
<style>
  #example2
 {
    background-color: white;
    padding: 26px;
 }
</style>
