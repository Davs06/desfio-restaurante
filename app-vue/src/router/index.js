import { createRouter, createWebHistory } from 'vue-router'
import BaseTemplate from '@/layouts/BaseTemplate.vue'
import AuthTemplate from '@/layouts/AuthTemplate.vue'
import HomeView from '../views/HomeView.vue'
import LogonView from '@/views/auth/LogonView.vue'
import LoginView from '@/views/auth/LoginView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {

      path: '/',
      component: BaseTemplate,
      children: [
        {
          path: '/',
          name: 'home',
          component: HomeView,
        }
      ]
    },
    {
      path: '/',
      component: AuthTemplate,
      children: [
        {
          path: '/login',
          name: 'login',
          component: LoginView
        },
        {
          path: '/logon',
          name: 'logon',
          component: LogonView
        }
      ]
    },
  ],
})

export default router
