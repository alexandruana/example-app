<template>
    <form @submit.prevent="submitForm" class="max-w-lg mx-auto p-4 shadow-md rounded-lg">
    <div class="mb-4 relative">
        <label for="client-search" class="block text-gray-700 text-sm font-bold mb-2">Client:</label>
        <input 
        id="client-search" 
        v-model="searchQuery" 
        @input="searchClients" 
        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        placeholder="Search for a client"
        />
        <div v-if="searchResults.length" class="absolute w-full bg-white mt-1 border border-gray-300 rounded shadow">
        <div v-for="client in searchResults" :key="client.id" @click="selectClient(client)" class="p-2 cursor-pointer hover:bg-gray-100">
            {{ client.first_name }} {{ client.last_name }}
        </div>
        </div>
    </div>

    <div class="mb-4">
        <label for="trip_name" class="block text-gray-700 text-sm font-bold mb-2">Trip Name:</label>
        <input id="trip_name" v-model="form.trip_name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4">
        <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start Date:</label>
        <input id="start_date" type="date" v-model="form.start_date" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4">
        <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End Date:</label>
        <input id="end_date" type="date" v-model="form.end_date" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-6">
        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
        <select id="status" v-model="form.status" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
        <option disabled value="">Select a Status</option>
        <option value="pending" class="text-amber-500">Pending</option>
        <option value="quoted" class="text-sky-500">Quoted</option>
        <option value="booked" class="text-lime-500">Booked</option>
        <option value="cancelled" class="text-red-500">Cancelled</option>
        </select>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
    </form>
</template>

<script setup>
import { reactive, ref, watch } from 'vue';
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


const submitForm = async () => {
    try {
        const response = await axios.post('/api/trips', form);
        console.log('Success:', response.data);
        // Handle success (e.g., showing a success message or redirecting the user)
    } catch (error) {
        console.error('Error:', error.response.data);
        // Handle error (e.g., displaying error messages to the user)
    }
};

</script>
