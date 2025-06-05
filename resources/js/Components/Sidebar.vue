<template>
  <aside
    id="sidebar"
    class="w-64  bg-white dark:bg-gray-900 border-r border-gray-200 dark:border-gray-700"
    aria-label="Sidebar"
  >
    <div class="h-full px-3 py-4 overflow-y-auto flex flex-col">
      <!-- Header -->
      <div class="flex items-center justify-between mb-4 px-2">
        <h1 class="text-lg font-bold text-gray-900 dark:text-white">TailAdmin</h1>
        <DarkModeToggle />
      </div>
      <!-- Nav -->
      <ul class="space-y-2 font-medium">
        <li v-for="item in menu" :key="item.label">
          <Link
            :href="route(item.route)"
            class="flex items-center p-2 rounded-lg group hover:bg-gray-100 dark:hover:bg-gray-800 transition"
            :class="{ 'bg-gray-100 dark:bg-gray-800 font-semibold': isActiveRoute(item.route) }"
          >
            <component :is="item.icon" class="w-5 h-5 text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" />
            <span class="ml-3 capitalize text-gray-700 dark:text-gray-300 group-hover:text-gray-900 dark:group-hover:text-white">
              {{ item.label }}
            </span>
          </Link>
        </li>
      </ul>

      <!-- Optional footer or logout -->
      <!-- <div class="mt-auto pt-4 border-t border-gray-200 dark:border-gray-700 px-2">
        Optional footer content here
      </div> -->
    </div>
  </aside>
</template>

<script setup>
import { ref } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import DarkModeToggle from '@/Components/DarkModeToggle.vue'

import { HomeIcon, ChartBarIcon,UserIcon } from '@heroicons/vue/24/outline'

const menu = ref([
  { label: 'dashboard', route: 'dashboard.index', icon: ChartBarIcon },
  { label: 'users', route: 'users.index', icon: UserIcon },
  { label: 'settings', route: 'settings.index', icon: HomeIcon },
])

const page = usePage()
const isActiveRoute = (name) => route().current(name)
</script>
