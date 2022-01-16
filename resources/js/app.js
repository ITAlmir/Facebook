require('./bootstrap');
window.Vue = require('vue').default;
import { createApp } from 'vue';
import router from './routes';
import MediaIndex from './components/media/Index.vue';
import Slider from './components/media/Slider.vue';
import Calendar from './components/media/Calendar';
import Weather from './components/media/Weather';

 
let app=createApp({})

app.component('calendar',Calendar)
app.component('media-index' , MediaIndex);
app.component('slider' , Slider);
app.component('weather',Weather);


app.use(router)

app.mount("#app")
