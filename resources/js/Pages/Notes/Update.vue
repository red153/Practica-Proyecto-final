<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from '@inertiajs/vue3';

const { props } = usePage();
const note = props.note || { titulo: '', contenido: '', importancia: 1 };

const form = useForm({
  titulo: note.titulo,
  contenido: note.contenido,
  importancia: note.importancia
});

</script>


<template>
    <Head title="Actualizar Nota" />
    <AppLayout>
      <div class="max-w-4xl mx-auto px-4 py-8 bg-custom-bg">
        <h2 class="text-2xl font-bold mb-6">Actualizar Nota</h2>
        <form @submit.prevent="form.put(route('notes.update', $page.props.note.id))" class="space-y-6">
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Título:</label>
            <input type="text" id="title" v-model="form.titulo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50 input" />
          </div>
          <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Contenido:</label>
            <textarea id="content" v-model="form.contenido" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50 input" rows="4"></textarea>
          </div>
          <div>
            <label for="importancia" class="block text-sm font-medium text-gray-700">Importancia:</label>
            <select id="importancia" v-model="form.importancia" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50 input">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" style="background-color: #311309;">
            Actualizar
          </button>
        </form>
      </div>
    </AppLayout>
  </template>


<style>
.bg-custom-bg {
    background-color: #c28f4a;
}
</style>
