<template>
    <UsersTable 
      :users="userStore.users"
      @edit="userStore.editingUser = $event"
      @delete="userStore.deleteUser($event)"
    />
    <AppPagination 
      :meta="userStore.pagination"
      @page-change="userStore.fetchUsers($event)"
    />
    <UserForm 
      v-if="userStore.editingUser"
      :user="userStore.editingUser"
      @save="userStore.updateUser($event)"
      @close="userStore.editingUser = null"
    />
  </template>
  
  <script setup>
  import { useUserStore } from '@/stores/userStore'
  import UsersTable from '@/components/Users/UsersTable.vue'
  import UserForm from '@/components/Users/UserForm.vue'
  import AppPagination from '@/components/UI/AppPagination.vue'
  
  const userStore = useUserStore()
  userStore.fetchUsers()
  </script>