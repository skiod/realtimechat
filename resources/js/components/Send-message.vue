<template>
    <div style="padding: 0 0 10px 10px;">
        <div>{{ typing.typing ? typing.user +' is Typing ...' : '' }} </div>
        <div>
            <input style="float:left;width:80%;margin-right:2%"
                   type="text" 
                   class="form-control" 
                   id="usr" 
                   @keyup.enter="sendIt()"
                   @keypress="UserTyping()"
                   @blur="UserStoppedTyping()"
                   v-model="message">
            <button style="float:left:width:18%" @click="sendIt()" type="button" class="btn btn-primary">Send</button>
        </div>
    </div>
</template>

<script>
    export default{
        props : ['current-user','typing'],
        data(){
            return {
                message : ''
            }
        },
        methods : {
            sendIt(){
                axios.post('/send',
                {
                    msg : this.message
                })
                this.message = '';
            },
            UserTyping(){
                if(this.message.length > 0 ){

                    let channel = Echo.join('chat')
                    setTimeout( () => {
                        console.log("clicked");
                        channel.whisper('typing', {
                        user: this.currentUser.name,
                        typing: true
                        })
                    }, 300)
                }else{
                    this.UserStoppedTyping();
                }
            },
            UserStoppedTyping(){
                 let channel = Echo.join('chat')
                setTimeout( () => {
                    channel.whisper('typing', {
                    user: this.currentUser.name,
                    typing: false
                    })
                }, 300)
            }
        }
    }
</script>

<style></style>