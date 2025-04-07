import { defineStore } from 'pinia'
import axios from 'axios'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    token: localStorage.getItem('auth_token') || null,
  }),
  actions: {
    async login(credentials) {
      const { data } = await axios.post('/api/login', credentials)
      this.token = data.token
      localStorage.setItem('auth_token', data.token)
    },
    logout() {
      this.token = null
      localStorage.removeItem('auth_token')
    },
  },
})