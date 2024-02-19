<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TripsTable from '@/Components/Trips/TripsTable.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

// This prop is automatically provided by Inertia with the data passed from the controller
const props = defineProps({
    trips: Array
});
</script>

<template>
    <Head title="Trips" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mx-auto mt-5">
                    <div class="flex flex-wrap">
                        <div class="w-full">
                            <!-- TripsTable is always displayed since we're no longer conditionally rendering it -->
                            <TripsTable :trips="trips" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
