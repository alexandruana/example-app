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
                :leg-data="leg"
                :leg-index="index"
                @add-leg="addLeg"
                @remove-leg="() => removeLeg(index)"
                @update-leg="updateLegData"
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

// Reactive state for the trip form
const form = reactive({
    client_id: '',
    trip_number: '',
    status: 'Pending'
});

// Search related reactive variables
const searchQuery = ref('');
const searchResults = ref([]);

// Function to search for clients
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

// Function to select a client from search results
const selectClient = (client) => {
    form.client_id = client.id;
    searchQuery.value = `${client.first_name} ${client.last_name}`;
    searchResults.value = [];
};

// Reactive array for storing legs
const legs = ref([{ /* initial leg data, if any */ }]);

// Function to add a new leg
const addLeg = () => {
    legs.value.push({ /* new leg data */ });
};

// Function to remove a leg by index
const removeLeg = (index) => {
    legs.value.splice(index, 1);
};

// Function to update leg data
const updateLegData = (index, legData) => {
    if (index >= 0 && index < legs.value.length) {
        legs.value[index] = legData;
    }
};

// console.log('Trip data:', { ...form, legs: legs.value });

// Variable to keep track of the last used ID, should be stored persistently
let lastUsedId = 0; // Initialize from persistent storage on application start

function generateUniqueId(date) {
    // Increment the last used ID to get a new unique sequential number
    const uniqueIdentifier = ++lastUsedId;

    // Extract the month and year from the date
    const month = String(date.getMonth() + 1).padStart(2, '0'); // +1 because getMonth() returns 0-11
    const year = date.getFullYear();

    // Combine the extracted month and year with the unique identifier
    const uniqueId = `${month}-${year}/${uniqueIdentifier}`;

    // Update the storage with the new lastUsedId value (not shown here)
    // updateStorage(lastUsedId);

    return uniqueId;
}

const submitForm = async () => {
    const startDate = legs.value.length > 0 ? new Date(legs.value[0].date) : null;
    if (!startDate || isNaN(startDate.getTime())) {
        console.error('No legs available or the first leg does not have a valid date.');
        return;
    }

    const allLocations = legs.value.flatMap(leg => [leg.from, leg.to]);
    const uniqueLocations = Array.from(new Set(allLocations));
    const routing = uniqueLocations.join('/');

    const uniqueTripId = generateUniqueId(startDate);
    console.log(`Unique Trip ID: ${uniqueTripId}`); // Log the unique_trip_id

    const tripData = {
        unique_trip_id: uniqueTripId,
        passenger_id: form.client_id,
        start_date: startDate.toISOString().split('T')[0],
        routing: routing,
        status: form.status,
        legs: legs.value.map(leg => ({
            from_location: leg.from,
            to_location: leg.to,
            date: leg.date,
            time: leg.time,
            pax: leg.pax
        }))
    };

    try {
        const response = await axios.post('/api/trips', tripData);
        console.log('Trip created successfully:', response.data);
        resetFormAndLegs();
        alert('Trip submitted successfully!');
    } catch (error) {
        console.error('Failed to create the trip:', error.response?.data || error.message);
        alert('Failed to submit the trip. Please try again.');
    }
};

function resetFormAndLegs() {
    // Reset the form fields to their initial states
    form.client_id = '';
    form.trip_number = '';
    form.status = 'Pending';

    // Clear the legs array
    legs.value = [{}];

    // Reset or persist the lastUsedId as needed
    // updateStorage(lastUsedId); // Ensure you implement updateStorage to persist the lastUsedId
}
</script>

