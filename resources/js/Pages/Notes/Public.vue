<script setup>
  import { Inertia } from '@inertiajs/inertia'
  import {router} from '@inertiajs/inertia-vue3'
  import { usePage } from '@inertiajs/inertia-vue3';
  import { Head, Link } from '@inertiajs/vue3';
  import AppLayout from "@/Layouts/AppLayout.vue";
  import { ref } from 'vue';

const props = defineProps({
    notes: { type: Object },
});

const isWhiteBackground = ref(false);

</script>

<template>
    <Head title="Listado de Notas Públicas" />
    <AppLayout>
      <div :class="{ 'bg-custom-bg': !isWhiteBackground, 'bg-white': isWhiteBackground }" class="border-2 border-solid border-black max-w-4xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-4" :class="{ 'text-black': isWhiteBackground }">Listado de notas públicas</h2>
        <label class="mb-4 flex items-center cursor-pointer">
            <span class="mr-2 text-sm text-gray-600">Cambiar fondo</span>
          <input type="checkbox" class="hidden" v-model="isWhiteBackground">
          <div class="relative w-12 h-6 bg-311309 rounded-full shadow-inner" style="background-color: #311309">
            <div class="toggle__dot absolute top-1/2 transform -translate-y-1/2 w-4 h-4 bg-white rounded-full shadow border-2" :style="{left: isWhiteBackground ? 'calc(100% - 20px)' : '2px'} "></div>
          </div>
        </label>
        <div>
            <br>
        </div>
        <div>
            <br>
        </div>
        <ul class="space-y-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4">
          <li v-for="note in notes" :key="note.id" class="bg-from-bg p-4 rounded-lg shadow">
            <h3 class="font-semibold text-lg text-black">{{ note.titulo }}</h3>
            <p class="text-gray-600">{{ note.contenido }}</p>
            <p class="text-gray-600">Importancia: {{ note.importancia }}</p>
          </li>
        </ul>
      </div>
    </AppLayout>
</template>

<style>
.bg-custom-bg {
  background-color: #c28f4a;
}

.bg-white {
  background-color: #ffffff;
}

.bg-from-bg {
  background-color: #efcb66;
}

.toggle__dot {
  transition: left 0.3s ease-in-out;
  width: 14px;
  height: 14px;
  left: 2px;
}

input:checked + .toggle__dot {
  left: calc(100% - 16px);
}
</style>
