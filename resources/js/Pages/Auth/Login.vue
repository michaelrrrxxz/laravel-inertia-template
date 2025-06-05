<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import UnauthenticatedLayout from '@/Layouts/UnauthenticatedLayout.vue'

defineProps({
  canResetPassword: Boolean,
  status: String,
})

const form = useForm({
  email: '',
  password: '',
  remember: false,
})

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  })
}
</script>

<template>
  <UnauthenticatedLayout>
    <!-- Left side marketing content -->
    <template #left>
      <div>
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
          We invest in the world’s potential
        </h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">
          Here at MichaelAngelo.dev we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.
        </p>
        <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">
          Read more about our app
          <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
          </svg>
        </a>
      </div>
    </template>

    <!-- Right side login form -->
    <div class="w-full p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <Head title="Log in" />
      <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
        Sign in to MichaelAngelo.dev
      </h2>

      <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
      </div>

      <form @submit.prevent="submit" class="space-y-6">
        <!-- Email -->
        <div>
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
          <input
            v-model="form.email"
            type="email"
            id="email"
            name="email"
            placeholder="name@company.com"
            required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-blue-500 focus:border-blue-500"
          />
          <div v-if="form.errors.email" class="text-red-600 text-sm mt-1">{{ form.errors.email }}</div>
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
          <input
            v-model="form.password"
            type="password"
            id="password"
            name="password"
            placeholder="••••••••"
            required
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:ring-blue-500 focus:border-blue-500"
          />
          <div v-if="form.errors.password" class="text-red-600 text-sm mt-1">{{ form.errors.password }}</div>
        </div>

        <!-- Remember + Forgot password -->
        <div class="flex items-start">
          <div class="flex items-center h-5">
            <input
              id="remember"
              name="remember"
              type="checkbox"
              v-model="form.remember"
              class="w-4 h-4 border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600"
            />
          </div>
          <div class="ms-2 text-sm">
            <label for="remember" class="font-medium text-gray-500 dark:text-gray-400">Remember this device</label>
          </div>
          <Link
            v-if="canResetPassword"
            :href="route('password.request')"
            class="ms-auto text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"
          >
            Lost Password?
          </Link>
        </div>

        <!-- Submit -->
        <button
          type="submit"
          :disabled="form.processing"
          class="w-full px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          :class="{ 'opacity-50 cursor-not-allowed': form.processing }"
        >
          Login to your account
        </button>

        <!-- Footer -->
        <div class="text-sm font-medium text-gray-900 dark:text-white">
          Not registered yet?
          <Link :href="route('register')" class="text-blue-600 hover:underline dark:text-blue-500">Create account</Link>
        </div>
      </form>
    </div>
  </UnauthenticatedLayout>
</template>
