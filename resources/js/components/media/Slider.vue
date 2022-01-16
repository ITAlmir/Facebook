<template>
  <div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<!-- <div class="alert alert-success ">
</div> -->
 <router-link :to="{name:'MediaIndex'}"><button type="submit" class="btn btn-primary mb-2">ToDo</button></router-link>
 <router-link :to="{name:'Calendar'}"><button type="submit" class="btn btn-primary mb-2">Calendar</button></router-link>
 <router-link :to="{name:'Slider'}"><button type="submit" class="btn btn-primary mb-2 active">Users</button></router-link>
 <router-link :to="{name:'Weather'}"><button type="submit" class="btn btn-primary mb-2">Weather</button></router-link>
 <a href="/home"><button type="submit" class="btn btn-danger mb-2">Back</button></a>
</div>     
<div class="container-fluid ">
<div class="card-columns">
<div class="card" v-for="user in users" :key="user.id">
<div class="newsstyle" >
<img class="card-img-top thumbPost"
 :key="user.id" :src="'images/'+user.thumbnail" >
 <b> {{user.firstname}}
 <button class="btn btn-sm btn-info commentDate" @click='user.showRow = !user.showRow'><span v-if="user.showRow">
              Hide</span><span v-if="!user.showRow">Show</span></button><br>
  {{user.lastname}} </b>
 <collapse-transition dimension="width">
 <span v-if="user.showRow" >
<hr class="clear:both"/>
<p>First Name: {{user.firstname}} </p>
<p>Last Name: {{user.lastname}}</p>
<p>Age: {{user.age}}</p>
      <p>E-mail: {{user.email}}</p>
      <p>Registered at: {{user.updated_at}}</p>
      <p>Last Update: {{user.created_at}}</p>
 </span>
</collapse-transition>
</div>
</div> 
</div> 
</div>
</div>
</div>
</template>

<script>
export default {
    components:{
        
    },
    data(){
        return{
            users:[],
        showRow: false,
        isOpenB: true         
        }
    },
    created(){
        this.getUser();
    },
    methods:{
        getUser(){
            axios
                .get("/api/slider")
                .then(res=>{
                    this.users = res.data;
                })
                .catch(error=>{
                    console.log(error);
                });
        },
        

}
}
</script>

<style>

</style>