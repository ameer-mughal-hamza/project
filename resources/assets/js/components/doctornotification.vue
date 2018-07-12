<template>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span
                class="glyphicon glyphicon-globe"></span>
            Notifications <span class="badge">{{ unreadNotifications.length }}</span> <span class="caret"></span>
        </a>

        <ul class="dropdown-menu notificationBar scrollable-menu" role="menu">
            <li v-for="notification in unreadNotifications">
                <img :src="'/doctor-images/'+notification.data.doctor.image_url" alt="">
                <a href="" v-on:click="MarkAsRead(notification)">
                    {{ notification.data.doctor.first_name }}<br>
                    <small>created a new post Title: {{ data.post.title }}</small>
                </a>
            </li>
            <li role="separator" class="divider"></li>
            <li v-if="unreadNotifications.length == 0">
                <a href="">There is no new notifications.</a>
            </li>
        </ul>
    </li>
</template>

<script>
    export default {
        props: ['unreads'],
        data() {
            return {
                unreadNotifications: ''
            }
        },
        mounted() {
            console.log('Component Mounted');
            axios.get('/doctor-notifications/get').then(response => {
                this.unreadNotifications.push(response.data),
                    console.log(this.unreadNotifications)
            });
            Echo.channel('PostApprove')
                .listen('PostApproveEvent', (e) => {
                    console.log(e.body);
                    this.unreadNotifications.push(e);
                });
        },
        methods: {
            MarkAsRead: function (notification) {
                console.log(notification);
                var data = {
                    id: notification.id
                };
                console.log('/notification/read/' + data.id)
                axios.get('/doctor/notification/read', data.id).then(response => {
                    let n = window.location.href = "/doctor/blog/post/35";
                    console.log(n);
                });
            }
        }
    }
</script>
<style scoped>

    .scrollable-menu {
        height: auto;
        max-height: 300px;
        overflow-x: hidden;
    }

    .notificationBar li a {
        font-size: 12px;
        margin-left: 35px;
        margin-right: 25px;
        margin-top: -45px;
    }

    .notificationBar > li a:hover {
        text-decoration: none;
        cursor: pointer;
    }

    .notificationBar li img {
        width: 50px;
        height: 50px;
        display: block;
        text-align: center;
        line-height: 30px;
        border: 1px solid #ddd;
        border-radius: 50%;
    }

</style>