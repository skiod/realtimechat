<template>
    <div class="container" style="margin-top:10px">
        
        <div class="row justify-content-center">
            <div class="col-sm-3" style="padding:0">
                <auth-users :users="users"></auth-users>
            </div>
            <div class="col-sm-9">
                <div class="card card-default">
                    <div class="card-header text-center" style="font-weight:bold">conversation</div>
                    <div>
                        <Messages :messages="messages" 
                                  :currentUser="currentUser"></Messages>
                    </div>
                    <send-message :current-user="currentUser"
                                  :typing="typing"></send-message>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Messages from './Messages';
    import AuthUsers from './Auth-users';
    import SendMessage  from './Send-message';
    export default {
        components : {Messages,AuthUsers,SendMessage},
        data(){
            return {
                messages : [],
                users : [],
                currentUser :null,
                typing : {}
            }
        },
        mounted() {
            this.currentUser = window.Laravel.user;
            console.log(this.currentUser.id)
            window.Echo.join('chat')
             .listen('SendMessage', (e) => {
                 this.messages.push(e);
             })
             .here((users) => {
                this.users =  users;
             })
             .joining((user) => {
                        var state = false;
                        this.users.map((usr) => {
                            if(usr.id === user.id){
                                state = true;
                                return;
                            }
                        })
                        if(!state){
                         this.users.push(user);
                        }
             })
             .leaving((user) => {
                        console.log(user.name);
                        this.users.map((usr,index) => {
                                if(usr.id === user.id){
                                    this.users.splice(index,1);
                                    return;
                                }
                        })
             })
             .listenForWhisper('typing', (e) => {
                 this.typing = e;
            });
            
        },
    }
</script>
