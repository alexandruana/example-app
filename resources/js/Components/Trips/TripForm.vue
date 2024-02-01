<template>
    <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:px-6">
            <div class="max-w-xs mt-2 flex rounded-md shadow-sm">
                <div class="relative flex flex-grow items-stretch focus-within:z-10">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        name="text"
                        id="client-search"
                        class="block w-full rounded-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Account search ..."
                        autocomplete="off"
                        v-model="searchQuery" 
                        @input="searchClients"
                    >
                    <div v-if="searchResults.length" class="absolute w-full bg-white inset-x-0 top-full mt-1 rounded-md shadow-lg z-10">
                        <div
                            v-for="client in searchResults"
                            :key="client.id"
                            @click="selectClient(client)"
                            class="block w-full rounded-md px-3 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-100 sm:text-sm sm:leading-6"
                        >
                            {{ client.first_name }} {{ client.last_name }}
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <div class="px-4 py-5 sm:p-6">
            <LegForm
                v-for="(leg, index) in legs"
                :key="index"
                :can-remove="legs.length > 1"
                @add-leg="addLeg"
                @remove-leg="() => removeLeg(index)"
            />
        </div>
        <div class="flex justify-end px-4 py-4 sm:px-6">
            <button 
                @click="submitForm"
                type="button"
                class="rounded-md bg-sky-500 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Submit flights
            </button>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import LegForm from '@/Components/Trips/LegForm.vue';
import axios from 'axios';

const form = reactive({
    client_id: '',
    trip_name: '',
    start_date: '',
    end_date: '',
    status: ''
});

const searchQuery = ref('');
const searchResults = ref([]);

const searchClients = async () => {
    if (searchQuery.value) {
        const response = await axios.get('/api/search-passengers', {
        params: { query: searchQuery.value }
        });
        searchResults.value = response.data;
    } else {
        searchResults.value = [];
    }
};

const selectClient = (client) => {
    form.client_id = client.id; // Set the client_id in the form
    searchQuery.value = client.first_name + ' ' + client.last_name; // Update the input field with the selected client's name
    searchResults.value = []; // Clear the search results
};

const legs = ref([{ /* initial leg data */ }]);

const addLeg = () => {
  legs.value.push({ /* new leg data */ });
};

const updateLeg = (index, legData) => {
  legs.value[index] = legData;
};

const removeLeg = (index) => {
  legs.value.splice(index, 1);
};

const submitForm = () => {
  // Handle submission logic here
};
</script>
