import { createRouter, createWebHistory } from 'vue-router';
import landing from '../pages/Landing.vue';
import subpage from '../pages/Subpage.vue';
import { useHelpers } from '../composables/useHelpers';

const { url } = useHelpers()

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  scrollBehavior(to, from, savedPosition) {
    // always scroll to top
    return { top: 0 }
  },
  routes: [
    {
      path: url('/'),
      name: 'landing',
      component: landing
    },
    {
      path: url('/:tag/:uniqueName'),
      name: 'subpage',
      component: subpage
    }
  ]
})

export default router
