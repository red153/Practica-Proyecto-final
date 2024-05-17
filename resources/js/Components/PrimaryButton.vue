<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-custom border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-from-bg focus:bg-yellow
    -700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <slot />
    </button>
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
.bg-custom {
  background-color: #311309;
}
</style>
