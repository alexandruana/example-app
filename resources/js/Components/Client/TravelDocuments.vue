<script setup>
import { ref } from "vue";

const isAddingDocument = ref(false);
const newDocument = ref({
type: "",
country: "",
number: "",
expiry: null,
});

const addDocument = () => {
isAddingDocument.value = true;
};

const saveDocument = () => {
// Validate and save new document
// For example, push to an array of documents
// Reset form and hide the new document row
};

const cancelAdd = () => {
isAddingDocument.value = false;
newDocument.value = { type: "", country: "", number: "", expiry: null };
};
</script>
<template>
<div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
        <h1 class="text-base font-semibold leading-6 text-gray-900">
        Travel documents
        </h1>
        <p class="mt-2 text-sm text-gray-700">
        A list of all the travel documents related to this passenger.
        </p>
    </div>
    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
        <button
        type="button"
        class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        @click="addDocument"
        >
        Add document
        </button>
    </div>
    </div>
    <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300">
            <thead>
            <tr>
                <th
                scope="col"
                class="border-2 py-3.5 pl-4 pr-3 text-center text-sm font-semibold text-gray-900"
                >
                #
                </th>
                <th
                scope="col"
                class="border-2 px-3 py-3.5 text-center text-sm font-semibold text-gray-900"
                >
                Documents
                </th>
                <th
                scope="col"
                class="border-2 px-3 py-3.5 text-center text-sm font-semibold text-gray-900"
                >
                Country
                </th>
                <th
                scope="col"
                class="border-2 px-3 py-3.5 text-center text-sm font-semibold text-gray-900"
                >
                Number
                </th>
                <th
                scope="col"
                class="border-2 px-3 py-3.5 text-center text-sm font-semibold text-gray-900"
                >
                Expiry
                </th>
                <th
                scope="col"
                class="border-2 px-3 py-3.5 text-center text-sm font-semibold text-gray-900"
                >
                Default
                </th>
                <th
                scope="col"
                class="border-2 px-3 py-3.5 text-center text-sm font-semibold text-gray-900"
                >
                Actions
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            <tr>
                <td
                class="whitespace-nowrap py-4 pl-4 pr-3 text-center text-sm font-medium text-gray-900"
                >
                1
                </td>
                <td
                class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center"
                >
                PPT
                </td>
                <td
                class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center"
                >
                Germany
                </td>
                <td
                class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center"
                >
                4321
                </td>
                <td
                class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center"
                >
                01 JAN 2025
                </td>
                <td
                class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center"
                >
                    <fieldset>
                        <legend class="sr-only">Notifications</legend>
                        <div class="space-y-5">
                            <div class="flex h-6 justify-center">
                                <input id="offers" aria-describedby="offers-description" name="offers" type="checkbox" class="h-4 w-4 rounded border-sky-300 text-sky-600 focus:ring-sky-600">
                            </div>
                        </div>
                    </fieldset>
                </td>
                <td
                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium"
                >
                <button
                    @click="console.log('Passport being edited')"
                    class="px-2 text-amber-500 hover:text-amber-300"
                >
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"
                    />
                    </svg>
                </button>
                <button
                    @click="console.log('Passport deleted')"
                    class="px-2 text-red-500 hover:text-red-300"
                >
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                    />
                    </svg>
                </button>
                </td>
            </tr>
            <tr v-if="isAddingDocument">
                <!-- Form Inputs for each field -->
                <td
                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900"
                >
                #
                </td>
                <td
                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900"
                >
                <input
                    v-model="newDocument.type"
                    class="w-full text-sm border-0 border-b border-sky-500"
                />
                </td>
                <td
                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900"
                >
                <input
                    v-model="newDocument.country"
                    class="w-full text-sm border-0 border-b border-sky-500"
                />
                </td>
                <td
                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900"
                >
                <input
                    v-model="newDocument.number"
                    class="w-full text-sm border-0 border-b border-sky-500"
                />
                </td>
                <td
                class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900"
                >
                <input
                    v-model="newDocument.expiry"
                    type="date"
                    class="w-full text-sm border-0 border-b border-sky-500"
                />
                </td>
                <td
                class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center"
                >
                    <fieldset>
                        <legend class="sr-only">Notifications</legend>
                        <div class="space-y-5">
                            <div class="flex h-6 justify-center">
                                <input id="offers" aria-describedby="offers-description" name="offers" type="checkbox" class="h-4 w-4 rounded border-sky-300 text-sky-600 focus:ring-sky-600">
                            </div>
                        </div>
                    </fieldset>
                </td>
                <td
                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium"
                >
                <!-- Save and Cancel Buttons -->
                <button
                    @click="saveDocument"
                    class="px-2 text-emerald-500 hover:text-emerald-300"
                >
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    />
                    </svg>
                </button>
                <button
                    @click="cancelAdd"
                    class="px-2 text-red-500 hover:text-red-300"
                >
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    />
                    </svg>
                </button>
                </td>
            </tr>
            <!-- More people... -->
            </tbody>
        </table>
        </div>
    </div>
    </div>
</template>
