<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TripsTable from '@/Components/Trips/TripsTable.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Trips" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>
                    <div class="mx-auto mt-5">
                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <TripsTable />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
