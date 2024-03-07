<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import axios from 'axios';
import { usePage, Inertia } from '@inertiajs/inertia-vue3';
import { Head,Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
  notes: { type: Object },
});


const deleteNote = async (noteId) => {
  try {
    const response = await axios.delete(`/notes/${noteId}`);
    console.log(response.data);
    usePage().refresh();
  } catch (error) {
    console.error('Error al eliminar la nota:', error);
  }
}

const goToUpdatePage = (noteId) => {
  Inertia.visit(route('notes.edit', { note: noteId }));
}


</script>

<template>
  <Head title="Listado de Notas" />
  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 py-8">
      <h2 class="text-2xl font-bold mb-4">Listado de notas</h2>
      <ul class="space-y-4">
        <li v-for="note in notes" :key="note.id" class="p-4 bg-white rounded-lg shadow">
          <h3 class="font-semibold text-lg">{{ note.titulo }}</h3>
          <p class="text-gray-600">{{ note.contenido }}</p>
          <button @click="deleteNote(note.id)" class="text-red-500">Eliminar</button>
          <Link :href="route('notes.edit', { note: note.id })"
      class="px-4 py-2 bg-gray-800 text-white border rounded-md font-semibold text-xs">
    Editar
</Link>
        </li>
      </ul>
    </div>
  </AppLayout>
</template>
