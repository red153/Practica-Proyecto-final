<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>



<template>
    <div class="bg-custom-bg h-screen flex justify-center items-center">
        <AuthenticationCard class="bg-form-bg">
            <template #logo>
                <AuthenticationCardLogo />
            </template>

            <form @submit.prevent="submit" class="bg-form-bg p-8 rounded-lg">
                <div>
                    <InputLabel for="email" value="Email" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full input"
                        required
                        autofocus
                        autocomplete="username"
                        style="background-color: #e9ce86; border-color: #e9ce86"
                        :style="{ borderColor: emailBorderColor }"
                        @focus="emailBorderColor = '#311309'"
                        @blur="emailBorderColor = '#e9ce86'"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full input"
                        required
                        autocomplete="current-password"
                        style="background-color: #e9ce86; border-color: #e9ce86"
                        :style="{ borderColor: passwordBorderColor }"
                        @focus="passwordBorderColor = '#311309'"
                        @blur="passwordBorderColor = '#e9ce86'"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <Checkbox v-model:checked="form.remember" name="remember" />
                        <span class="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-#311309">
                        Forgot your password?
                    </Link>

                    <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing" style="background-color: #311309; border-color: #311309">
                        Log in
                    </PrimaryButton>
                </div>
            </form>
        </AuthenticationCard>
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
