import axios from 'axios';


axios.defaults.baseURL = import.meta.env.VITE_BASE_API
// 'http://localhost:8000/api'
axios.defaults.withCredentials = true
axios.interceptors.request.use(config => {
  const token = localStorage.getItem('auth_token')
  if (token) {
    config.headers.Authorization = `Bearer ${token}`
  }
  return config
})

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
