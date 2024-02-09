<script setup>
import Modal from '@/Components/Modal.vue';
import TripForm from '@/Components/Trips/TripForm.vue';
import { ref } from 'vue';

const showTripForm = ref(false);

const toggleModal = () => {
    showTripForm.value = !showTripForm.value
}

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
                                    class="sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">
                                    Trip ID
                                </th>
                                <th
                                    scope="col"
                                    class="sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">
                                    Customer
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
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 py-4 px-3 text-left text-sm font-medium text-gray-900"
                                >
                                    02-2024/01
                                </td>
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 py-4 px-3 text-left text-sm font-medium text-gray-900"
                                >
                                    Joe Doe
                                </td>
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 py-4 px-3 text-sm font-medium text-gray-900"
                                >
                                    15 FEB 2024
                                </td>
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 py-4 px-3 text-sm font-medium text-gray-900"
                                >
                                    LRAR / OMDW
                                </td>
                                <td
                                    class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500"
                                >
                                    <button class="px-2 text-amber-500 hover:text-amber-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
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