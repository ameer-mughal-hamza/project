/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

Vue.component('adminnotification', require('./components/AdminNotification.vue'));

const app = new Vue({
    el: '#sickbay',
    data: {
        notifications: ''
    },
    created() {
        axios.post('/notifications/get').then(response => {
            this.notifications = response.data
        });
        Echo.channel('AdminNotifications')
            .listen('PostCreatedEvent', (e) => {
                this.notifications.push(e);
                console.log(e);
            });
    }
});