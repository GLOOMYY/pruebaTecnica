<script setup>
// import InputError from '@/Components/InputError.vue';
// import InputLabel from '@/Components/InputLabel.vue';
// import PrimaryButton from '@/Components/PrimaryButton.vue';
// import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    lastname:'',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
  <Head title="Register" />

  <div class="container mt-5">
  <form @submit.prevent="submit">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>

      <input
        id="name"
        type="text"
        class="form-control"
        v-model="form.name"
        required
        autofocus
        autocomplete="name"
      />

      <div class="invalid-feedback mt-2">{{ form.errors.name }}</div>
    </div>

    <div class="mb-3">
      <label for="lastname" class="form-label">Last Name</label>

      <input
        id="lastname"
        type="text"
        class="form-control"
        v-model="form.lastname"
        required
        autofocus
        autocomplete="lastname"
      />

      <div class="invalid-feedback mt-2">{{ form.errors.lastname }}</div>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>

      <input
        id="email"
        type="email"
        class="form-control"
        v-model="form.email"
        required
        autocomplete="username"
      />

      <div class="invalid-feedback mt-2">{{ form.errors.email }}</div>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>

      <input
        id="password"
        type="password"
        class="form-control"
        v-model="form.password"
        required
        autocomplete="new-password"
      />

      <div class="invalid-feedback mt-2">{{ form.errors.password }}</div>
    </div>

    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Confirm Password</label>

      <input
        id="password_confirmation"
        type="password"
        class="form-control"
        v-model="form.password_confirmation"
        required
        autocomplete="new-password"
      />

      <div class="invalid-feedback mt-2">{{ form.errors.password_confirmation }}</div>
    </div>

    <div class="d-flex justify-content-end mt-4">
      <button
        type="submit"
        class="btn btn-primary ms-4"
        :class="{ 'disabled': form.processing }"
        :disabled="form.processing"
      >
        Register
      </button>
    </div>
  </form>
</div>
  
</template>

