<template>
    <div class="card card-default">
        <div class="card-header text-center" style="font-weight:bold">Online</div>
        <div>
        </div>
        <div class="card-body">
            <div>
                <div v-for="(user,index) in users" :key="index">
                    <span class="icon-connect"></span>
                    <span>{{user.name}}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props :['users']
    }
</script>

<style>
    .icon-connect{
        font-size: 11px;
        display: inline-block;
        width: 10px;
        height: 10px;
        background: #46d046;
        border-radius: 50%;
    }
</style>