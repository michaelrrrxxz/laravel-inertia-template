<template>
  <AppLayout>
<div class="mb-4 flex items-center justify-between">
   <PageHeader>Users</PageHeader>

    </div>

 <div class="bg-white dark:bg-gray-800  p-6 rounded-lg shadow-md max-w-2xl mx-auto">
<form @submit.prevent="submit" class="max-w-md mx-auto">
    <!-- Name -->
    <div class="relative z-0 w-full mb-5 group">
      <input
        v-model="form.name"
        type="text"
        id="name"
        name="name"
        placeholder=" "
        required
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
      />
      <label
        for="name"
        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
      >
        Name
      </label>
    </div>

    <!-- Email -->
    <div class="relative z-0 w-full mb-5 group">
      <input
        v-model="form.email"
        type="email"
        id="email"
        name="email"
        placeholder=" "
        required
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
      />
      <label
        for="email"
        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
      >
        Email
      </label>
    </div>

    <!-- Password -->
    <div class="relative z-0 w-full mb-5 group">
      <input
        v-model="form.password"
        type="password"
        id="password"
        name="password"
        placeholder=" "
        required
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
      />
      <label
        for="password"
        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
      >
        Password
      </label>
    </div>

    <!-- Confirm Password -->
    <div class="relative z-0 w-full mb-5 group">
      <input
        v-model="form.password_confirmation"
        type="password"
        id="password_confirmation"
        name="password_confirmation"
        placeholder=" "
        required
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
      />
      <label
        for="password_confirmation"
        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0"
      >
        Confirm Password
      </label>
    </div>

    <button
      type="submit"
      class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
    >
      Submit
    </button>
  </form>

    </div>

  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import PageHeader from '@/Components/PageHeader.vue'
import { Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

function submit() {
  form.post(route('users.store'))
}



</script>
