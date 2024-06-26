<script setup>
  import { Inertia } from '@inertiajs/inertia'
  import { usePage } from '@inertiajs/inertia-vue3';
  import { Head, Link } from '@inertiajs/vue3';
  import AppLayout from "@/Layouts/AppLayout.vue";
  import { ref } from 'vue';

  const props = defineProps({
  notes: { type: Object },
});

const isWhiteBackground = ref(false);

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

let isAscOrder = ref(true);

const toggleAscOrder = () => {
  isAscOrder.value = true;
  fetchNotes();
}

const toggleDescOrder = () => {
  isAscOrder.value = false;
  fetchNotes();
}

const toggleBackground = () => {
  isWhiteBackground.value = !isWhiteBackground.value;
}

const fetchNotes = () => {
  const order = isAscOrder.value ? 'asc' : 'desc';
  console.log('Orden actual:', order);
  Inertia.get(route('notes.indexOrdenado', { order: order }), {
    onSuccess: (data) => {
      notes.value = data.notes;
    },
    onError: () => {
      alert('Error al obtener las notas.');
    }
  });
}
</script>

<template>
  <Head title="Listado de Notas" />
  <AppLayout>
    <div :class="{ 'bg-custom-bg': !isWhiteBackground, 'bg-white': isWhiteBackground }" class="border-2 border-solid border-black max-w-4xl mx-auto px-4 py-8">
      <h2 class="text-2xl font-bold mb-4" :class="{ 'text-black': isWhiteBackground }">Listado de notas</h2>
      <label class="mb-4 flex items-center cursor-pointer">
        <span class="mr-2 text-sm text-gray-600">Cambiar fondo</span>
        <input type="checkbox" class="hidden" v-model="isWhiteBackground">
        <div class="relative w-12 h-6 bg-311309 rounded-full shadow-inner" style="background-color: #311309">
          <div @click.stop="toggleBackground" class="toggle__dot absolute top-1/2 transform -translate-y-1/2 w-4 h-4 bg-white rounded-full shadow border-2" :style="{left: isWhiteBackground ? 'calc(100% - 20px)' : '2px'} "></div>
        </div>
      </label>
        <button @click.stop="toggleDescOrder" @click.outside="closeDropdown" class="px-4 py-2 text-white border rounded-md font-semibold text-xs" style="background-color: #311309">
          Orden del mas importante
        </button>
        <button @click.stop="toggleAscOrder" @click.outside="closeDropdown" class="px-4 py-2 text-white border rounded-md font-semibold text-xs" style="background-color: #311309">
          Orden del menos importante
        </button>
        <div class="bg-form-bg rounded-lg p-6">
                <p class="mt- text-sm leading-relaxed">
                    Para dejar el filtrado vuelve a clicar en mostrar notas
                </p>
        </div>
        <div>
            <p>Notas: </p>
            <ul class="space-y-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                <li v-for="note in notes" :key="note.id" class="bg-from-bg p-4 rounded-lg shadow">
                <h3 class="font-semibold text-lg text-gray-600">{{ note.titulo }}</h3>
                <p class="text-gray-600">{{ note.contenido }}</p>
                <p class="text-gray-600">Importancia: {{ note.importancia }}</p> <!-- Mostrar importancia -->
                <button @click="deleteNote(note.id)" class="text-red-500">Eliminar</button>
                <Link :href="route('notes.edit', { note: note.id })" class="px-4 py-2 text-white border rounded-md font-semibold text-xs" style="background-color: #311309">
                    Editar
                </Link>
                </li>
            </ul>
        </div>
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
