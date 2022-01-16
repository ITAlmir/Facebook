<template>
<div class="col-xl-12">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<!-- <div class="alert alert-success ">
</div> -->
 <router-link :to="{name:'MediaIndex'}"><button type="submit" class="btn btn-primary mb-2">ToDo</button></router-link>
 <router-link :to="{name:'Calendar'}"><button type="submit" class="btn btn-primary mb-2">Calendar</button></router-link>
 <router-link :to="{name:'Slider'}"><button type="submit" class="btn btn-primary mb-2">Users</button></router-link>
 <router-link :to="{name:'Weather'}"><button type="submit" class="btn btn-primary mb-2 active">Weather</button></router-link>
 <a href="/home"><button type="submit" class="btn btn-danger mb-2">Back</button></a>
</div> 
<div id="weather" :class="typeof weather.main != 'undefined' && weather.main.temp > 16 ? 
    'warm' : ''">
    <main>
        <div class="search-box">
            <input 
            type="text" 
            class="search-bar form-control" 
            placeholder="search..."
            v-model="query"
            @keypress="fetchWeather"
            />
        </div>
        <div class="weather-wrap" v-if="typeof weather.main != 'undefined'">
            <div class="location-box">
                <div class="location"> {{weather.name}}, {{weather.sys.country}}</div>
                <div class="date">{{dateBuilder()}}</div>
            </div>

            <div class="weather-box">
                <div class="temp">{{ Math.round(weather.main.temp) }}°c</div>
                <div class="weather">{{weather.weather[0].main}}</div>
            </div>
        </div>
    </main>
</div>
</div>
</div>
</template>

<script>
export default {
    data(){
        return{
            api_key: "0dc92a91010bf69ba775dc0ddf59df85",
            url_base:'https://api.openweathermap.org/data/2.5/',
            query:'',
            weather:{},
        }
    },
    methods:{
        fetchWeather(e){
            if(e.key == "Enter"){
                fetch(`${this.url_base}weather?q=${this.query}&units=metric&APPID=${this.api_key}`)
                .then(res =>{
                    return res.json();
                }).then(this.setResults);
            }
        },
        setResults(results){
            this.weather = results;
        },
        dateBuilder(){
            let d = new Date();
            let months = ['Januar', 'Februar','März','April','Mei','Juni','Juli',
            'August','September','Oktober','November','Dezember'];
            let days = ['Sontag','Montag','Dienstag','Mitwoch','Donerstag','Samstag'];

            let day = days[d.getDay()];
            let date = d.getDate();
            let month = months[d.getMonth()];
            let year = d.getFullYear();

            return `${day} ${date} ${month} ${year}`;
        }
    }
}
</script>

<style>
#weather{
    background-image: url('/images/cold-bg.jpg');
    background-size: cover;
    background-position: bottom;
    transition: 0.4s;
}
#weather.warm {
    background-image: url('/images/warm-bg.jpg');
}
main{
    min-height: 70vh;
    padding: 25px;
    background-image: linear-gradient(to bottom,rgba(0,0,0,0.25), rgba(0,0,0,0.75));
}
.search-box{
    width: 200px;
    margin-bottom: 30px;
}
.search-box .search-bar{
    display: block;
    font-size: 20px;
    color: #313131;
    box-shadow:  rgba(0, 0, 0, 0.25);
    background-color: rgba(255,255,255,0.5);
    border-radius: 0px 16px 0px 16px;
    transition: 0.4s;
}
.search-box .search-bar:focus{
    box-shadow: 0px 0px 16px rgba(0, 0, 0, 0.25);
    background-color: rgba(255,255,255,0.75);
    border-radius: 16px 0px 16px 0px;
}
.location-box{
    color: #fff;
    font-size: 32px;
    font-weight: 500;
    text-align: center;
    text-shadow: 1px 3px rgba(0, 0, 0, 0.25);
}
.location-box .date{
    color: #fff;
    font-size: 20px;
    font-weight: 300;
    font-style: italic;
    text-align: center;
}
.weather-box{
    text-align: center;
}
.weather-box .temp{
    display: inline-block;
    padding: 10px 25px;
    color: #fff;
    font-size: 102px;
    font-weight: 900;

    text-shadow: 3px 6px rgba(0, 0, 0, 0.25);
    background-color: rgba(255,255,255,0.25);
    border-radius: 16px;
    margin: 30px 0px;
    box-shadow: 3px 6px rgba(0,0,0,0.25);
}
.weather-box .weather{
    color: #fff;
    font-size: 48px;
    font-weight: 700;
    font-style: italic;
    text-shadow: 3px 6px rgba(0,0,0,0.25);
}
</style>