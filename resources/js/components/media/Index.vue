<template>
<div class="col-xl-12">
<div class="card shadow">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<!-- <div class="alert alert-success ">
</div> -->
 <router-link :to="{name:'MediaIndex'}"><button type="submit" class="btn btn-primary mb-2 active">ToDo</button></router-link>
 <router-link :to="{name:'Calendar'}"><button type="submit" class="btn btn-primary mb-2">Calendar</button></router-link>
 <router-link :to="{name:'Slider'}"><button type="submit" class="btn btn-primary mb-2">Users</button></router-link>
 <router-link :to="{name:'Weather'}"><button type="submit" class="btn btn-primary mb-2">Weather</button></router-link>
<a href="/home"><button type="submit" class="btn btn-danger mb-2">Back</button></a>
</div>  
<div class=" w-100 d-flex">
<div class="card-body d-flex justify-content-center">
<div id='' class='newsstyle' >
     <h4 class="font-wight-bold">{{itemsCount}} </h4><hr class="clear:both"/>
    <ol>
        <li v-for="(list,index) in doList" :key="list.index">
           <div class="mw-90 text-break fw-bold text-danger"  ><p class="m-2 "
            v-bind:class="{ completed: list.active }" style=" break-word"> 
               {{list.name}}
                <button @click="removeItem(index)" 
           class="btn btn-sm btn-info bg-danger commentDate">delete</button>
           <button  v-on:click="toggleActive(list)" 
           class="btn btn-sm mx-3 btn-info commentDate"><span v-if="list.text">
              {{list.text}}</span><span v-if="!list.text">
              done</span></button>
           </p></div><hr>
        </li>
    </ol>
    <form @submit.prevent="addNewItem" class="d-flex align-items-center">
    <input v-model.trim.lazy="newItem" class="form-control m-2" placeholder="add new task"/>
    <button type="submit" class="btn btn-success m-2  ">Add Item</button>
    </form>
</div>
</div>
</div>
</div>
</div>
</template>

<script>
    export default {
        data(){
            return{
                newItem:'',
                active:true,
                text: 'done',
          doList:[
              { name:"First Item"},
              {name:"Second Item"},
              {name:"Third Item"}             
          ],
          };
          },
        methods:{
            addNewItem(){
            if(this.newItem !=='')
             this.doList.push({name:this.newItem});
              this.newItem='';
            },
            removeItem(index){
                this.doList = this.doList.filter((list,i) => i!=index);

            },
            toggleActive: function(item,index) {
    	    item.active = !item.active;
            if(!item.active){
                item.text = 'done';
            }else{
                item.text = 'undone';
            }
          console.log(item);
    },
        },
        computed:{
            itemsCount(){
                if(this.doList.length == 0){
                    return 'All done for today !';
                }else{
                    return 'You have '+ this.doList.length + ' ToDo tasks today...';
                }
            }
        }
        
    };
</script>


<style>
.completed {
        text-decoration: line-through;
        background-color:lightgray;
        color: rgb(4, 83, 4);
}
</style>
