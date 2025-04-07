<template>
    <div class="min-h-screen bg-gray-100">
      <div class="container mx-auto px-4 py-8">
        <router-view />
      </div>
    </div>
  </template>
  
  <script setup>
  import { RouterView } from 'vue-router'
  </script>