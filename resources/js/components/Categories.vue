<template>
    <div class="card-body p-0" style="max-height: 300px;padding: 20px !important;">
        <div class="form-group" v-if="categories.length > 0" >
            <div class="form-check" v-for="category in categories" :key="category.id">
                <input name="category[]" class="form-check-input" type="checkbox" :value="category.id">
                <label class="form-check-label">{{ category.name }}</label>
            </div>
        </div>
        <div class="form-group" v-else>
            No category found
        </div>
    </div>
</template>
<script>
export default {
    data:function(){
        return{
           categories : [],
        }
    },
    created:function(){
        let self = this;
        axios.get('/categories').then(function (response){
            console.log(response.data.data);
            self.categories = response.data.data;

        }).catch(function(response){

        })
    }
}
</script>
