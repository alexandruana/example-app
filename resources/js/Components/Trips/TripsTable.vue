<script setup>
import Modal from '@/Components/Modal.vue';
import TripForm from '@/Components/Trips/TripForm.vue';
import { ref } from 'vue';

// Define the props that TripsTable expects to receive
const props = defineProps({
    trips: Array
});

const showTripForm = ref(false);

const toggleModal = () => {
    showTripForm.value = !showTripForm.value
}

// Method to determine the class based on trip status
const getStatusClass = (status) => {
    switch (status.toLowerCase()) {
        case 'pending':
        return 'bg-amber-50';
        case 'confirmed':
        return 'bg-green-50';
        case 'cancelled':
        return 'bg-red-50';
        default:
        return ''; // Default class if none of the cases match
    }
};

</script>

<template>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Trips</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all trips.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <button
                    @click="toggleModal"
                    type="button"
                    class="block rounded-md bg-sky-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Register trip
                </button>
                <Modal :show="showTripForm" @close="showTripForm = false">
                    <TripForm @close-modal="showTripForm = false"/>
                </Modal>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                        <table class="min-w-full border-separate border-spacing-0">
                        <thead class="bg-gray-300">
                            <tr>
                                <th
                                    scope="col"
                                    class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                                    Trip ID
                                </th>
                                <th
                                    scope="col"
                                    class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell">
                                    Start Date
                                </th>
                                <th
                                    scope="col" 
                                    class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                                    Routing
                                </th>
                                <th
                                    scope="col" 
                                    class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                                    Status
                                </th>
                                <th
                                    scope="col" 
                                    class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(trip, index) in props.trips" :key="index">
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 py-4 px-3 text-left text-sm font-medium text-gray-900"
                                >
                                    {{ trip.unique_trip_id }}
                                </td>
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 py-4 px-3 text-sm font-medium text-gray-900"
                                >
                                    {{ trip.start_date }}
                                </td>
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 py-4 px-3 text-sm font-medium text-gray-900"
                                >
                                    {{ trip.routing }}
                                </td>
                                <td class="whitespace-nowrap border-b border-gray-200 py-4 px-3 text-sm font-medium text-gray-900">
                                    <span :class="['inline-flex items-center rounded-md px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset', getStatusClass(trip.status)]">
                                        {{ trip.status }}
                                    </span>
                                </td>
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 py-4 px-3 text-sm text-gray-500"
                                >
                                    <button class="px-2 text-sky-500 hover:text-sky-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </button>
                                    <button class="px-2 text-red-500 hover:text-red-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </td>
                                </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
</template>