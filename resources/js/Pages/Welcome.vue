<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Bienvenido a NoteVerse" />

    <div class="min-h-screen flex flex-col justify-between bg-custom-bg">
        <!-- Header Section -->
        <header class="w-full py-6 bg-custom-bg flex justify-between items-center px-10 shadow-md">
            <div class="flex items-center">
                <img class="w-16 h-16 mr-4" src="../../../logo/NoteVerse.jpg" alt="NoteVerse Logo"/>
                <h1 class="text-3xl font-bold text-black">NoteVerse</h1>
            </div>
            <div>
                <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="bg-custom-bg text-white font-semibold px-6 py-3 rounded-lg hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100">Dashboard</Link>

                <template v-else>
                    <Link :href="route('login')" class="bg-custom-bg text-white font-semibold px-6 py-3 rounded-lg hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100" style="background-color: #311309">Iniciar Sesión</Link>

                    <Link v-if="canRegister" :href="route('register')" class="bg-custom-bg text-white font-semibold px-6 py-3 rounded-lg ml-4 hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100" style="background-color: #311309">Registrarse</Link>
                </template>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex justify-center items-center flex-grow">
            <div class="text-center p-6 max-w-3xl">
                <h2 class="text-5xl font-bold mb-4 text-black">Bienvenido a NoteVerse</h2>
                <p class="text-lg text-black mb-6">Tu destino para las mejores soluciones en gestión de notas. Organiza, administra y accede a tus notas desde cualquier lugar, en cualquier momento.</p>
                <div>
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="bg-custom-bg text-white font-semibold px-6 py-3 rounded-lg hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100">Ir al Dashboard</Link>
                    <template v-else>
                        <Link :href="route('login')" class="bg-from-bg text-white font-semibold px-6 py-3 rounded-lg hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100">Iniciar Sesión</Link>
                        <Link v-if="canRegister" :href="route('register')" class="bg-from-bg text-white font-semibold px-6 py-3 rounded-lg mt-4 ml-4 hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100">Registrarse</Link>
                    </template>
                </div>
            </div>

        </main>
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
                    <h2 class="text-2xl font-semibold">Crear nota</h2>
                </div>

                <p class="mt-4 text-sm leading-relaxed">
                   Para empezar a crear notas solo tienes que hacer click en Create note y ya podrás empezar a crear tus nuevas notas
                </p>
            </div>

            <div class="bg-form-bg rounded-lg p-6">
                <h2 class="text-2xl font-semibold">Mostrar Notas</h2>
                <p class="mt-4 text-sm leading-relaxed">
                    Si ya tienes notas ve a "Mostrar notas" y gestiónalas como quieras
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

        <!-- Footer Section -->
        <footer class="w-full py-4 bg-from-bg text-center">
            <p class="text-black">&copy; 2024 NoteVerse. Todos los derechos reservados.</p>
        </footer>
    </div>
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
</style>
