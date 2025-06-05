<template>
  <UnauthenticatedLayout>

    <!-- Left marketing content -->
    <template #left>
      <div class="text-center md:text-left">
        <h1 class="text-4xl font-extrabold mb-4 dark:text-white">Welcome to Our Product</h1>
        <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
          Discover the best solutions to boost your productivity and grow your business. Join thousands of happy customers.
        </p>
        <Link

          class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
        >
          Login
        </Link>
      </div>
    </template>


    <div></div>

  </UnauthenticatedLayout>
</template>

<script setup>
import UnauthenticatedLayout from '@/Layouts/UnauthenticatedLayout.vue'


</script>
