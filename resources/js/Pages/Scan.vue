<template>
  <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-4">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Scan QR Code</h1>

    <!-- Flash messages -->
    <div v-if="flashMessage" class="text-green-600 text-center mb-2">
      {{ flashMessage }}
    </div>
    <div v-if="flashError" class="text-red-600 text-center mb-2">
      {{ flashError }}
    </div>

    <!-- QR Scanner box -->
    <div class="w-[50vw] rounded-xl overflow-hidden shadow-lg bg-white p-4">
      <video
        ref="video"
        class="w-full aspect-video rounded-lg border border-gray-300"
        autoplay
        playsinline
      ></video>

      <p v-if="error" class="text-red-500 mt-2 text-center">{{ error }}</p>
    </div>
  </div>

</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
import { BrowserMultiFormatReader } from '@zxing/browser';

// Refs and State
const video = ref(null);
const error = ref('');
const scanning = ref(false);
let codeReader = null;

// Flash messages (from Inertia props)
const page = usePage();
const flashMessage = computed(() => page.props.flash?.message || '');
const flashError = computed(() => page.props.flash?.error || '');

// Store function - submit attendee ID
function store(data) {
  console.log(`Scanned: ${data}`);

  router.post('/attendance/save', {
    attendee_id: data,
  }, {
    preserveScroll: true,
  });
}

// QR Scanner setup
onMounted(async () => {
  try {
    codeReader = new BrowserMultiFormatReader();
    const devices = await BrowserMultiFormatReader.listVideoInputDevices();

    if (devices.length === 0) {
      error.value = 'No camera found';
      return;
    }

    await codeReader.decodeFromVideoDevice(devices[0].deviceId, video.value, (result, err) => {
      if (result && !scanning.value) {
        scanning.value = true;
        store(result.getText());

        // Lock scanning for 1 second to avoid duplicate submissions
        setTimeout(() => {
          scanning.value = false;
        }, 1000);
      }
    });
  } catch (err) {
    error.value = 'Camera error or permission denied.';
    console.error(err);
  }
});

// Cleanup
onUnmounted(() => {
  if (codeReader) {
    codeReader.reset();
  }
});
</script>
