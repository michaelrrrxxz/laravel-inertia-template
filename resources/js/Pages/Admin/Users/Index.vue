<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import PageHeader from '@/Components/PageHeader.vue'
import Modal from '@/Components/Modal.vue' // assuming path
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

const showModal = ref(false)

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

function submit() {
  form.post(route('users.store'), {
    onSuccess: () => {
      showModal.value = false
      form.reset()
    },
  })
}

defineProps({
  users: Array,
})
</script>

<template>
  <AppLayout>
        <div class="mb-4 flex items-center justify-between">
      <PageHeader>Users</PageHeader>

      <button
        @click="showModal = true"
        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
      >
        Add
      </button>
    </div>
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <!-- Table -->
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th class="px-6 py-3">Name</th>
            <th class="px-6 py-3">Email</th>
            <th class="px-6 py-3">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id" class="bg-white dark:bg-gray-800">
            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ user.name }}</td>
            <td class="px-6 py-4">{{ user.email }}</td>
            <td class="px-6 py-4">
              <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Modal -->
    <Modal :show="showModal" @close="showModal = false">
      <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md max-w-2xl mx-auto">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Add New User</h2>
  <form @submit.prevent="submit" class="max-w-md mx-auto">
    <!-- Name -->
    <div class="relative z-0 w-full mb-6 group">
      <input
        v-model="form.name"
        type="text"
        name="name"
        id="name"
        placeholder=" "
        required
        class="peer block w-full appearance-none border-0 border-b-2 bg-transparent py-3 px-1 text-sm text-gray-900 dark:text-white focus:border-indigo-500 focus:outline-none focus:ring-0 border-gray-300 dark:border-gray-600 transition duration-200"
      />
      <label
        for="name"
        class="absolute left-1 top-3 text-sm text-gray-500 dark:text-gray-400 transition-all duration-200 peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-0 peer-focus:text-sm peer-focus:text-indigo-500"
      >
        Name
      </label>
    </div>

    <!-- Email -->
    <div class="relative z-0 w-full mb-6 group">
      <input
        v-model="form.email"
        type="email"
        name="email"
        id="email"
        placeholder=" "
        required
        class="peer block w-full appearance-none border-0 border-b-2 bg-transparent py-3 px-1 text-sm text-gray-900 dark:text-white focus:border-indigo-500 focus:outline-none focus:ring-0 border-gray-300 dark:border-gray-600 transition duration-200"
      />
      <label
        for="email"
        class="absolute left-1 top-3 text-sm text-gray-500 dark:text-gray-400 transition-all duration-200 peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-0 peer-focus:text-sm peer-focus:text-indigo-500"
      >
        Email
      </label>
    </div>

    <!-- Password -->
    <div class="relative z-0 w-full mb-6 group">
      <input
        v-model="form.password"
        type="password"
        name="password"
        id="password"
        placeholder=" "
        required
        class="peer block w-full appearance-none border-0 border-b-2 bg-transparent py-3 px-1 text-sm text-gray-900 dark:text-white focus:border-indigo-500 focus:outline-none focus:ring-0 border-gray-300 dark:border-gray-600 transition duration-200"
      />
      <label
        for="password"
        class="absolute left-1 top-3 text-sm text-gray-500 dark:text-gray-400 transition-all duration-200 peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-0 peer-focus:text-sm peer-focus:text-indigo-500"
      >
        Password
      </label>
    </div>

    <!-- Confirm Password -->
    <div class="relative z-0 w-full mb-6 group">
      <input
        v-model="form.password_confirmation"
        type="password"
        name="password_confirmation"
        id="password_confirmation"
        placeholder=" "
        required
        class="peer block w-full appearance-none border-0 border-b-2 bg-transparent py-3 px-1 text-sm text-gray-900 dark:text-white focus:border-indigo-500 focus:outline-none focus:ring-0 border-gray-300 dark:border-gray-600 transition duration-200"
      />
      <label
        for="password_confirmation"
        class="absolute left-1 top-3 text-sm text-gray-500 dark:text-gray-400 transition-all duration-200 peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-0 peer-focus:text-sm peer-focus:text-indigo-500"
      >
        Confirm Password
      </label>
    </div>

    <!-- Submit Button -->
    <button
      type="submit"
      class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
    >
      Submit
    </button>
  </form>
      </div>
    </Modal>
    </div>
  </AppLayout>
</template>
