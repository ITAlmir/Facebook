<template>
<section
 class="loginsection"
 @click="$emit('close-login')">
</section>
<div class="loginform">
<h1>Login</h1><hr>
<form @submit.prevent="Login">
<br><br>
<label for="email"> email :</label>
<input v-model="email" type="text" size = "40" name="email" placeholder="enter your e-mail"><br><br>
<label for="password"> password:</label>
<input v-model="password" type="password" size = "40" name="password" placeholder="enter your password"><br><br>
<input class="loginsubmit" type="submit" name="submit" value="Login" >
<br>  <br>  
</form>
<p>Or <router-link to="/"> Sing Up</router-link> if you don't have account</p>
</div>
</template>

<style>

</style>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
