<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >


    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-md-12 col-lg-10 col-xl-8 border p-4">
            <div v-if="canLogin" class="text-center">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="btn btn-primary btn-lg btn-block mb-3"
                >Dashboard</Link>

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="btn btn-primary btn-lg btn-block mb-3"
                    >Log in</Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="btn btn-primary btn-lg btn-block mb-3"
                    >Register</Link>
                </template>
            </div>
        </div>
    </div>
</div>









</div>

</template>

<style>
.btn-outline-primary:hover {
    background-color: rgba(0, 123, 255, 0.1); 
}

</style>
