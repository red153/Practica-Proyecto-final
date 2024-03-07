<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
  titulo: '',  
  contenido: '' 
});
</script>

<template>
  <Head title="Crear Nota" />
  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 py-8">
      <h2 class="text-2xl font-bold mb-6">Nueva Nota</h2>
      <form @submit.prevent="form.post(route('notes.store'))" class="space-y-6">
        <div>
          <label for="title" class="block text-sm font-medium text-gray-700">Título:</label>
          <input type="text" id="title" v-model="form.titulo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" />
        </div>
        <div>
          <label for="content" class="block text-sm font-medium text-gray-700">Contenido:</label>
          <textarea id="content" v-model="form.contenido" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" rows="4"></textarea>
        </div>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Guardar
        </button>
      </form>
    </div>
  </AppLayout>
</template>