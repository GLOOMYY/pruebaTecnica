<script setup>

import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-4">
        <header>
            <h2 class="h4 fw-medium text-gray-900">Eliminar Cuenta</h2>

            <p class="mt-1 small text-gray-600">
                Una vez que se elimine tu cuenta, todos sus recursos y datos se borrarán de forma permanente. Antes de eliminar
                tu cuenta, descarga cualquier dato o información que desees conservar.
            </p>
        </header>

        <button class="btn btn-danger" @click="confirmUserDeletion">Eliminar Cuenta</button>

        <div v-if="confirmingUserDeletion" class="modal" style="display: block;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="h4 fw-medium text-gray-900">
                            ¿Estás seguro de que quieres eliminar tu cuenta?
                        </h2>

                        <p class="mt-1 small text-gray-600">
                            Una vez que se elimine tu cuenta, todos sus recursos y datos se borrarán de forma permanente. Por favor,
                            ingresa tu contraseña para confirmar que deseas eliminar permanentemente tu cuenta.
                        </p>

                        <div class="mt-4">
                            <label for="password" class="sr-only">Contraseña</label>

                            <input
                                id="password"
                                ref="passwordInput"
                                v-model="form.password"
                                type="password"
                                class="form-control"
                                placeholder="Contraseña"
                                @keyup.enter="deleteUser"
                            />

                            <div class="invalid-feedback" v-if="form.errors.password">{{ form.errors.password }}</div>
                        </div>

                        <div class="mt-4 d-flex justify-content-end">
                            <button class="btn btn-secondary me-3" @click="closeModal">Cancelar</button>

                            <button
                                class="btn btn-danger"
                                :class="{ 'disabled': form.processing }"
                                :disabled="form.processing"
                                @click="deleteUser"
                            >
                                Eliminar Cuenta
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

