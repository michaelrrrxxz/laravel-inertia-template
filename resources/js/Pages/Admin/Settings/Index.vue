<template>
  <AppLayout>
<div class="mb-4 flex items-center justify-between">
   <PageHeader>Settings</PageHeader>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <Container>
            Settings
        </Container>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import Container from '@/Components/Container.vue'
import PageHeader from '@/Components/PageHeader.vue'
// import { Link } from '@inertiajs/vue3'


defineProps({
    users: {
        type: Array,
    }
})
</script>
