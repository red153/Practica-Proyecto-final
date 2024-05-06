<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>
<template>
    <Head title="Forgot Password" />

    <AuthenticationCard class="bg-custom-bg">
        <template #logo>
            <h1 class="text-3xl font-bold mb-4">Forgot our Password</h1>
        </template>

        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div class="bg-from-bg p-4 rounded-lg shadow">
                <InputLabel for="email" value="Email" class="font-semibold text-lg" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full input"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" class="px-4 py-2 text-white border rounded-md font-semibold text-xs" style="background-color: #311309">
                    Email Password Reset Link
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
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
