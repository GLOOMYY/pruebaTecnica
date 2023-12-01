<script setup>

import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});
</script>

<template>
    <section>
        <header>
            <h2 class="h4 fw-medium text-gray-900">Información de Perfil</h2>

            <p class="mt-1 small text-gray-600">
                Actualiza la información de perfil y la dirección de correo electrónico de tu cuenta.
            </p>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-4">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>

                <input
                    id="name"
                    type="text"
                    class="form-control"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <div class="invalid-feedback" v-if="form.errors.name">{{ form.errors.name }}</div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>

                <input
                    id="email"
                    type="email"
                    class="form-control"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <div class="invalid-feedback" v-if="form.errors.email">{{ form.errors.email }}</div>
            </div>

            <div v-if="mustVerifyEmail && user.email_verified_at === null">
                <p class="small mt-2 text-gray-800">
                    Tu dirección de correo electrónico no está verificada.
                    <button
                        :href="route('verification.send')"
                        class="btn btn-link text-gray-600"
                    >
                        Haz clic aquí para reenviar el correo de verificación.
                    </button>
                </p>

                <div
                    v-show="status === 'verification-link-sent'"
                    class="mt-2 fw-medium small text-success"
                >
                    Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.
                </div>
            </div>

            <div class="mt-4">
                <button :disabled="form.processing" class="btn btn-primary">
                    Guardar
                </button>

                <transition name="fade">
                    <p v-if="form.recentlySuccessful" class="small text-gray-600">Guardado.</p>
                </transition>
            </div>
        </form>
    </section>
</template>

