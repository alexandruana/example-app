<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TripForm from '@/Components/Trips/TripForm.vue'
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Trips" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Trips</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-6">
                    <div class="col-span-2">
                        <TripForm />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
