<template>
  <section>
    <header>
      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Theme</h2>
      <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        Toggle between Light and Dark mode.
      </p>
    </header>

    <!-- Dark Mode Toggle Button -->
    <button
      @click="toggleDarkMode"
      class="mt-4 p-2 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition"
      aria-label="Toggle Dark Mode"
    >
      <component :is="isDark ? Sun : Moon" class="w-5 h-5 text-gray-800 dark:text-white" />
    </button>
  </section>
</template>

<script setup>
import { useDarkMode } from '@/darkmode.js'
import { Moon, Sun } from 'lucide-vue-next'

const { isDark, toggleDarkMode } = useDarkMode()
</script>
