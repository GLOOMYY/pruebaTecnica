<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />
  
    <div class="container mt-5">
      <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
      </div>
  
      <form @submit.prevent="submit">
        <div>
          <InputLabel for="email" value="Email" />
  
          <TextInput
            id="email"
            type="email"
            class="form-control"
            v-model="form.email"
            required
            autofocus
            autocomplete="username"
          />
  
          <InputError class="mt-2" :message="form.errors.email" />
        </div>
  
        <div class="mt-4">
          <InputLabel for="password" value="Password" />
  
          <TextInput
            id="password"
            type="password"
            class="form-control"
            v-model="form.password"
            required
            autocomplete="current-password"
          />
  
          <InputError class="mt-2" :message="form.errors.password" />
        </div>

  
        <div class="flex items-center justify-end mt-4">
  
          <PrimaryButton class="btn btn-primary ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Log in
          </PrimaryButton>
        </div>
      </form>
    </div>
</template>
  
