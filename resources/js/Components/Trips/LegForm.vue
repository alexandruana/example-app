<template>
    <form @submit.prevent="submitForm" class="w-full border border-gray-200 p-4 rounded-lg mb-4">
        <div class="flex flex-wrap -mx-3 items-center justify-between">
            <!-- From Field -->
            <div class="relative px-3 w-full md:w-1/5">
                <label for="from" class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-900">
                    From
                </label>
                <input
                    id="from"
                    type="text"
                    v-model="form.from"
                    class="block w-full rounded-md border-0 py-1.5 uppercase text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    placeholder="Departure airport"
                >
            </div>
            <!-- To Field -->
            <div class="relative px-3 w-full md:w-1/5">
                <label for="to" class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-900">
                    To
                </label>
                <input
                    id="to"
                    type="text"
                    v-model="form.to"
                    class="block w-full rounded-md border-0 py-1.5 uppercase text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    placeholder="Arrival airport"
                >
            </div>
            <!-- Date Field -->
            <div class="relative px-3 w-full md:w-1/5">
                <label for="date" class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-900">
                    Date
                </label>
                <input
                    id="date"
                    type="date"
                    v-model="form.date"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
            </div>
            <!-- Time Field -->
            <div class="relative px-3 w-full md:w-1/5">
                <label for="time" class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-900">
                    Time
                </label>
                <input
                    id="time"
                    type="time"
                    v-model="form.time"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
            </div>
            <!-- PAX Field -->
            <div class="relative px-3 w-full md:w-1/5">
                <label for="pax" class="absolute -top-2 left-2 inline-block bg-white px-1 text-xs font-medium text-gray-900">
                    PAX
                </label>
                <input
                    id="pax"
                    type="number"
                    v-model="form.pax"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
            </div>
            <!-- Add and Remove Buttons -->
            <div class="px-3 mt-4 md:mt-0">
                <button
                    @click="$emit('add-leg')"
                    type="button"
                    class="text-sky-500 hover:text-sky-400 text-2xl px-2.5 py-3 font-bold rounded focus:outline-none focus:shadow-outline"
                >
                    <!-- Plus Icon SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                <button
                    v-if="canRemove"
                    @click="$emit('remove-leg')"
                    class="text-red-500 hover:text-red-400 px-2.5 py-3 font-bold rounded focus:outline-none focus:shadow-outline"
                >
                    <!-- Minus Icon SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
            </div>
        </div>
    </form>
</template>


  
    
<script setup>
import { ref, watch, defineProps, defineEmits } from 'vue';

// Define props
const props = defineProps({
    canRemove: Boolean,
    legData: Object, // Accept initial leg data as a prop
    legIndex: Number // Accept the index of the leg
});

// Define emits
const emits = defineEmits(['add-leg', 'remove-leg', 'update-leg']);

// Reactive state for the leg form
const form = ref({
    from: props.legData?.from || '',
    to: props.legData?.to || '',
    date: props.legData?.date || '',
    time: props.legData?.time || '',
    pax: props.legData?.pax || 1,
});

// Watch for changes in form and emit an update event
watch(form, (newForm) => {
    emits('update-leg', props.legIndex, newForm);
}, { deep: true });

// Optional: function to handle local form submission, if needed
const submitForm = () => {
    // Handle the leg form submission here
    // For instance, you might want to validate the form data
    console.log('Leg data:', form.value);
};
</script>

    