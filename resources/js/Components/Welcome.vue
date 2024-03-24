<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 border-b border-gray-200" style="background-color: #311309">

            <h1 class="mt-8 text-2xl font-medium text-white">
                Bienvenido a NoteVerse
            </h1>

            <p class="mt-6 text-white leading-relaxed">
                Aquí podrás anotar todo lo que tengas que hacer a lo largo del día
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8" style="background-color: #311309">
            <div class="bg-form-bg rounded-lg p-6">
                <div class="flex items-center">
                    <h2 class="text-2xl font-semibold">Create note</h2>
                </div>

                <p class="mt-4 text-sm leading-relaxed">
                   Para empezar a crear notas solo tienes que hacer click en Create note y ya podrás empezar a crear tus nuevas notas
                </p>
            </div>

            <div class="bg-form-bg rounded-lg p-6">
                <h2 class="text-2xl font-semibold">Shownotes</h2>
                <p class="mt-4 text-sm leading-relaxed">
                    Si ya tienes notas ve a shownotes y gestiónalas como quieras
                </p>
            </div>
            <div class="bg-form-bg rounded-lg p-6">
                <h2 class="text-2xl font-semibold ">Entorno cómodo</h2>
                <p class="mt- text-sm leading-relaxed">
                    Disfruta de un entorno cómodo para poder tener anotadas todas tus tareas
                </p>
            </div>
        </div>
    </div>
</template>





<style>
.bg-custom-bg {
    background-color: #c28f4a;
}

.bg-form-bg {
    background-color: #efcb66;
}

.input {
    background-color: #e9ce86;
}
</style>
