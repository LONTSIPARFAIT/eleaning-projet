import './bootstrap';

import Alpine from 'alpinejs'
import App from './components/App.vue'


window.Alpine = Alpine;
createApp(App).mount('#app');

Alpine.start();
