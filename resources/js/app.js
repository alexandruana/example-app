import './bootstrap';

import Alpine from 'alpinejs';
import router from './router';


window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue'

const app = createApp()

import Counter from './components/Counter.vue'
app.component('counter', Counter)

app.mount('#app')