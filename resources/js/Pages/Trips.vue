<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TripsTable from '@/Components/Trips/TripsTable.vue';
import TripDetails from '@/Components/Trips/TripDetails.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps, ref } from 'vue';

const props = defineProps({
    trips: Array // This prop is automatically provided by Inertia with the data passed from the controller
});

const selectedTrip = ref(null);

const handleSelectTrip = (trip) => {
    selectedTrip.value = trip;
};
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
                                <TripsTable v-if="!selectedTrip" :trips="trips" @select-trip="handleSelectTrip" />
                                <TripDetails v-else :trip="selectedTrip" @back="selectedTrip = null" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
