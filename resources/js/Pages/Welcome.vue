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
    <Head title="Welcome" />

    <div class="flex justify-center items-center min-h-screen bg-custom-bg">
        <div v-if="canLogin" class="p-6 text-center">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="bg-yellow-400 text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-300 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="bg-yellow-300 text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-400 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="bg-yellow-300 text-black font-semibold px-6 py-3 rounded-lg mt-4 ml-4 hover:bg-yellow-400 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-100">Register</Link>
            </template>
        </div>
    </div>
</template>

<style>
.bg-custom-bg {
    background-color: #c28f4a;
}
</style>
