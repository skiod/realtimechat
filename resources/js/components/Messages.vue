<template>
        <div class="container-msg">
        
            <div v-for="(message,index) in messages" :key="index" 
                 class="message-cnt"
                 style="margin-left:5px;overflow:hidden;margin-bottom:5px;margin-bottom:5px ;padding:13px 0" >
                <div 
                 :style="message.user.id == currentUser.id ? 'float:right;margin-right:5px;margin-bottom:5px' : 'margin-bottom:5px'" 
                >
                <span class="sender">{{message.user.name}}</span>
                <span class="message" :class="message.user.id == currentUser.id ? 'message-sender' :''">{{message.data}}</span>
                <span class="message-time" :style="message.user.id == currentUser.id ? 'right:0;' : 'left:0' ">{{message.time}}</span>
                </div>
            </div>
        </div>
</template>
<script>
    export default{
        props : ['messages','currentUser']
    }
</script>
<style scoped>
    .message-cnt{
        position:relative;
    }
    .message-time{
        font-size: 11px;
        position:absolute;
        bottom:0;
    }
    .sender{
        font-weight: bold;
    }
    .container-msg{
        height:400px;
        padding-top: 10px;
    }
    .message-sender{
        background:#2196f3 !important;
        color:white
    }
    .message{
        min-width:30px;
        background: #ddd;
        display: inline-block;
        padding: 5px;
        border-radius: 15px;
    }
</style>