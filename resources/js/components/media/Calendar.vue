<template>
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<!-- <div class="alert alert-success ">
</div> -->
 <router-link :to="{name:'MediaIndex'}"><button type="submit" class="btn btn-primary mb-2">ToDo</button></router-link>
 <router-link :to="{name:'Calendar'}"><button type="submit" class="btn btn-primary mb-2 active">Calendar</button></router-link>
 <router-link :to="{name:'Slider'}"><button type="submit" class="btn btn-primary mb-2">Users</button></router-link>
 <router-link :to="{name:'Weather'}"><button type="submit" class="btn btn-primary mb-2">Weather</button></router-link>
 <a href="/home"><button type="submit" class="btn btn-danger mb-2">Back</button></a>
</div>  
<div class="m-auto">
  <section class="mx-2 d-flex">  
   <h5 class="font-weight-bold m-2"> {{currentMonthName}}</h5>
    <h5 class="font-weight-bold"> {{currentYear}}</h5>
  </section>
<section class="d-flex ">
    <p class="mh-100 text-center" style="width:14.28%;" v-for="day in days" :key='day'>
       <b> {{day}} </b>
    </p>
</section>
<section class="d-flex flex-wrap">
    <p v-for="num in startDay()" :key="num" class="text-center" style="width:14.28%;">
        </p>
    <p v-for="num in daysInMonth()" :key="num" class="text-center" style="width:14.28%;"
     :class="currentDateClass(num)">
        {{num}}</p>
</section> 
<section class="d-flex justify-content-between my-2">
    <button class="p-x2 border rounded" @click="prev">Prev</button>
    <button class="p-x2 border rounded" @click="next">Next</button>
</section>
</div>
</div>
</div>
</template>

<style>

</style>

<script>
    export default {
      data(){
      return{
        currentDate:new Date().getUTCDate(),
        currentYear:new Date().getFullYear(),
        currentMonth:new Date().getMonth(),
        days:['Sun','Mon','Tue','Wed','Thu','Fri','Sat'],
      };
      },
      methods:{
          daysInMonth(){
              return new Date(this.currentYear,this.currentMonth+1,0).getDate();
          },
          startDay(){
            return new Date(this.currentYear,this.currentMonth,1).getDay();
          },
          next(){
              if(this.currentMonth == 11){
                  this.currentMonth = 0;
                  this.currentYear++;
              }else{
              this.currentMonth++;
              }
          },
          prev(){
              if(this.currentMonth == 0){
                  this.currentMonth = 11;
                  this.currentYear--;
              }else{
              this.currentMonth--;
              }
          },
          currentDateClass(num){
              const calenderFullDate = new Date(this.currentYear,this.currentMonth,num).toDateString();
              const currentFullDate = new Date().toDateString();
              return calenderFullDate == currentFullDate ? 'bg-danger text-white font-weight-bold rounded-circle':'';
          }
      },
      computed:{
          currentMonthName(){
              return new Date(this.currentYear,this.currentMonth).toLocaleString('default',{month:"long"});
          }
      }
    };
</script>