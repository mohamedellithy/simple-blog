<template>
    <div class="col-lg-12" >
        <div class="sidebar-item categories">
            <div class="sidebar-heading">
                <h2>Categories</h2>
            </div>
            <div class="content">
                <ul>
                    <li v-for="category in categories" :key="category.id">
                        <router-link :to="{ path : '/categories-page/'+category.id }" tag="a">- {{ category.name }}</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script >

export default {
    data:function(){
        return{
            categories:[],
        }
    },
    created:function(){
        let self = this;
        axios.get('/categories').then(function(response){
            self.categories = response.data.data;
            console.log(self.categories);
       }).catch(function(response){

       });
    },
}
</script>
