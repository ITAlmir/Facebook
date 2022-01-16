import MediaIndex from './components/media/Index';
import { createRouter, createWebHistory } from 'vue-router'
import Slider from './components/media/Slider';
import Calendar from './components/media/Calendar';
import Weather from './components/media/Weather';


export let routes = [{
    path:'/media',
    name:'MediaIndex',
    component:MediaIndex
},
{
    path:'/slider',
    name:'Slider',
    component:Slider
},
{
    path:'/calendar',
    name:'Calendar',
    component:Calendar
},
{
    path:'/weather',
    name:'Weather',
    component:Weather
},
];
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
  })
  export default router