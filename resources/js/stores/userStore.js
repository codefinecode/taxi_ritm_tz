import { defineStore } from 'pinia'
import axios from 'axios'

export const useUserStore = defineStore('users', {
  state: () => ({
    users: [],
    pagination: {},
    editingUser: null,
  }),
  actions: {
    async fetchUsers(page = 1) {
      const { data } = await axios.get(`/api/users?page=${page}`)
      this.users = data.data
      this.pagination = data.meta
    },
    async updateUser(user) {
      try {
        const { data } = await axios.put(`/api/users/${user.id}`, user);
        
        const index = this.users.findIndex(u => u.id === user.id);
        if (index !== -1) {
          this.users[index] = data.data;
        }
        
        this.editingUser = null;
        return data;
      } catch (error) {
        console.error('Failed to update user:', error);
        throw error; 
      }
    },
    async deleteUser(id) {
      await axios.delete(`/api/users/${id}`)
      await this.fetchUsers()
    },
  },
})