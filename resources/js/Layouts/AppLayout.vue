<template>
  <div class="flex min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <Sidebar />

    <main class="flex-1 p-4">
      <!-- Header with ProfileDropdown and Dark Mode Toggle -->
      <div class="flex justify-between items-center mb-4">
        <ProfileDropdown />
      </div>

      <slot />
    </main>
  </div>
</template>

<script setup>
import Sidebar from '@/Components/Sidebar.vue'
import ProfileDropdown from '@/Components/ProfileDropdown.vue'
import { useDarkMode } from '@/darkmode.js'

const { toggleDarkMode } = useDarkMode()
</script>
