<template>
  <li class="text-gray-700 flex items-center space-x-1 font-[800]">
    <ion-icon :name="icon"></ion-icon>
    <RouterLink :to="to" class="">{{ value }}</RouterLink>
  </li>
</template>

<script setup>
import { RouterLink } from 'vue-router';
defineProps({
  icon: String,
  value: String,
  to: String
});
</script>