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
        <header class="w-full py-6 bg-from-bg flex justify-between items-center px-10 shadow-md">
            <div class="flex items-center">
                <img class="w-16 h-16 mr-4" src="../../../logo/NoteVerse.jpg" alt="NoteVerse Logo"/>
                <h1 class="text-3xl font-bold text-black">NoteVerse</h1>
            </div>
            <div>
                <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="bg-custom-bg text-white font-semibold px-6 py-3 rounded-lg hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100">Dashboard</Link>

                <template v-else>
                    <Link :href="route('login')" class="bg-custom-bg text-white font-semibold px-6 py-3 rounded-lg hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100">Iniciar Sesión</Link>

                    <Link v-if="canRegister" :href="route('register')" class="bg-custom-bg text-white font-semibold px-6 py-3 rounded-lg ml-4 hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100">Registrarse</Link>
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
                        <Link :href="route('login')" class="bg-custom-bg text-white font-semibold px-6 py-3 rounded-lg hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100">Iniciar Sesión</Link>
                        <Link v-if="canRegister" :href="route('register')" class="bg-custom-bg text-white font-semibold px-6 py-3 rounded-lg mt-4 ml-4 hover:bg-white hover:text-black focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100">Registrarse</Link>
                    </template>
                </div>
            </div>
        </main>

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
