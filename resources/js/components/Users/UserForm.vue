<template>
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
      <div class="bg-white rounded-lg p-6 w-full max-w-md">
        <h2 class="text-lg font-medium mb-4">Edit User</h2>
        
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="login">
            Login
          </label>
          <input
            id="login"
            v-model="form.login"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text"
          >
        </div>
        
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email
          </label>
          <input
            id="email"
            v-model="form.email"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="email"
          >
        </div>
  
        <div class="flex justify-end">
          <button
            @click="$emit('close')"
            class="mr-2 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          >
            Cancel
          </button>
          <button
            @click="handleSave"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          >
            Save
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { reactive, watch } from 'vue'
  
  const props = defineProps({
    user: {
      type: Object,
      required: true
    }
  })
  
  const emit = defineEmits(['save', 'close'])
  
  const form = reactive({
    login: props.user.login,
    email: props.user.email
  })
  
  watch(() => props.user, (newUser) => {
    form.login = newUser.login
    form.email = newUser.email
  })
  
  const handleSave = () => {
    emit('save', {
      id: props.user.id,
      ...form
    })
    emit('close')
  }
  </script>