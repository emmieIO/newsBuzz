<script setup>
import { RouterLink } from 'vue-router';
import Navlink from './components/Navlink.vue';
</script>

<template>
  <div class="bg-gray-100 min-h-screen">
    <div class="p-3">
      <div class="md:w-[89%] mx-auto md:flex md:items-center md:justify-between">
        <RouterLink to="/" class="flex items-center space-x-2 text-3xl font-bold text-gray-700">
          <ion-icon name="newspaper-outline"></ion-icon> 
          <h1 class="">NewsBuzz.</h1>
        </RouterLink>
        <nav>
          <ul class="md:flex md:space-x-4 md:items-center ">
           
            <Navlink icon="home-outline" value="Home" to="/"/>
            <Navlink icon="information-circle-outline" value="About" to="/about"/>
            <Navlink icon="pencil-outline" value="My posts" to="/my-posts"/>
            <Navlink icon="log-in-outline" value="Login" to="/login"/>
            <Navlink icon="person-add-outline" value="Register" to="/register"/>
            <Navlink icon="lock-closed-outline" value="My Account" to="/Dashboard"/>
          </ul>
        </nav>
      </div>
    </div>

    <div>
      <div class="md:w-[89%] mx-auto">
        <RouterView />
      </div>
    </div>
  
  
    <div>
      <!-- <footer>my footer</footer> -->
    </div>
  </div>
</template>


