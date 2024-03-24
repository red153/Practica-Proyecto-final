<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Inertia } from '@inertiajs/inertia'
import { usePage } from '@inertiajs/inertia-vue3';
import { Head, Link } from '@inertiajs/vue3';


const props = defineProps({
  notes: { type: Object },
});


const deleteNote = (noteId) => {
  Inertia.delete(`/notes/${noteId}`, {
    onSuccess: () => {
      usePage().reload();
    },
    onError: () => {
      alert('No se pudo eliminar la nota.');
    }
  });
}
const goToUpdatePage = (noteId) => {
  Inertia.visit(route('notes.edit', { note: noteId }));
}


</script>



<template>
    <Head title="Listado de Notas" />
    <AppLayout>
      <div class="border-2 border-solid border-black max-w-4xl mx-auto px-4 py-8 bg-custom-bg">
        <h2 class="text-2xl font-bold mb-4">Listado de notas</h2>
        <ul class="space-y-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4">
          <li v-for="note in notes" :key="note.id" class="bg-from-bg p-4 rounded-lg shadow">
            <h3 class="font-semibold text-lg">{{ note.titulo }}</h3>
            <p class="text-gray-600">{{ note.contenido }}</p>
            <button @click="deleteNote(note.id)" class="text-red-500">Eliminar</button>
            <Link :href="route('notes.edit', { note: note.id })" class="px-4 py-2 text-white border rounded-md font-semibold text-xs" style="background-color: #311309">
              Editar
            </Link>
          </li>
        </ul>
      </div>
    </AppLayout>
  </template>




<style>
.bg-custom-bg {
    background-color: #c28f4a;
}

.bg-from-bg {
    background-color: #efcb66;
}

.input {
    background-color: #e9ce86;
}
</style>
