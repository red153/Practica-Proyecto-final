<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

// TODO aun tiene un cuadrado blanco

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>




<template>
    <div class="bg-custom-bg h-screen flex justify-center items-center">
      <AuthenticationCard class="bg-form-bg">
        <template #logo>
            <img
                    class="w-16 h-16"
                    src="../../../../logo/NoteVerse.jpg"
                />
        </template>

        <form @submit.prevent="submit" class="flex flex-col space-y-4">
          <div class="bg-form-bg p-8 rounded-lg">
            <div>
              <InputLabel for="name" value="Name" />
              <TextInput
                id="name"
                v-model="form.name"
                type="text"
                class="input"
                required
                autofocus
                autocomplete="name"
              />
              <InputError :message="form.errors.name" />
            </div>

            <div>
              <InputLabel for="email" value="Email" />
              <TextInput
                id="email"
                v-model="form.email"
                type="email"
                class="input"
                required
                autocomplete="username"
              />
              <InputError :message="form.errors.email" />
            </div>

            <div>
              <InputLabel for="password" value="Password" />
              <TextInput
                id="password"
                v-model="form.password"
                type="password"
                class="input"
                required
                autocomplete="new-password"
              />
              <InputError :message="form.errors.password" />
            </div>

            <div>
              <InputLabel for="password_confirmation" value="Confirm Password" />
              <TextInput
                id="password_confirmation"
                v-model="form.password_confirmation"
                type="password"
                class="input"
                required
                autocomplete="new-password"
              />
              <InputError :message="form.errors.password_confirmation" />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
              <InputLabel for="terms">
                <div class="flex items-center">
                  <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                  <div class="ms-2">
                    I agree to the
                    <a target="_blank" :href="route('terms.show')" class="link">Terms of Service</a>
                    and
                    <a target="_blank" :href="route('policy.show')" class="link">Privacy Policy</a>
                  </div>
                </div>
                <InputError :message="form.errors.terms" />
              </InputLabel>
            </div>
          </div>

          <div class="flex justify-between">
            <Link :href="route('login')" class="link">Already registered?</Link>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing" style="background-color: #311309">
              Register
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

