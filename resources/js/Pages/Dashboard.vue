<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage, useForm } from '@inertiajs/vue3';

const {users} = usePage().props

defineProps({ users:Array });


const updateStatus = async (userId, currentStatus) => {

    const form = useForm({
        userId:userId,
        currentStatus:currentStatus
    });
    
    form.put(route('active.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            form.reset()
            alert('Ha ocurrido un error')
        },
    });

    window.location.reload();
};
</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Last</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Change Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(user, index) in users" :key="index">
                            <th scope="row">{{ user.id }}</th>
                            <td>{{ user.name }}</td>
                            <td>{{ user.lastname }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.active==1 ? "Activo":"Inactivo" }}</td>
                            <td>{{ new Date(user.created_at).toLocaleString()}}</td>
                            <td>
                                <button class="btn btn-primary" @click="updateStatus(user.id, user.active)">
                                {{ user.active === 1 ? "Desactivar" : "Activar" }}
                                </button>
                            </td>     
                        </tr>
                        </tbody>
                    </table>
                </div>               
            </div>
        </div>
    </AuthenticatedLayout>
</template>
