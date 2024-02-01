<template>
    <form @submit.prevent="submitForm" class="w-full bg-gray-100 p-6 rounded-lg shadow-lg mb-4">
        <div class="flex flex-wrap -mx-3 items-center">
            <div class="px-3 flex-1 min-w-0">
                <label for="from" class="block text-sm font-medium leading-6 text-gray-900">From</label>
                <div class="mt-2">
                    <input
                        id="from"
                        type="text"
                        v-model="form.from"
                        class="font-bold appearance-none block w-full bg-gray-100 text-sky-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-neutral-50"
                        placeholder="From"
                    >
                </div>
            </div>
            <div class="px-3 flex-1 min-w-0">
                <label for="to" class="block text-sm font-medium leading-6 text-gray-900">To</label>
                <div class="mt-2">
                    <input
                        id="to"
                        type="text"
                        v-model="form.to"
                        class="font-bold appearance-none block w-full bg-gray-100 text-sky-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-neutral-50"
                        placeholder="To"
                    >
                </div>
            </div>
            <div class="px-3 flex-1 min-w-0">
                <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                    <div class="mt-2">
                        <input
                            id="date"
                            type="date"
                            v-model="form.date"
                            class="font-bold appearance-none block w-full bg-gray-100 text-sky-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-neutral-50"
                        >
                    </div>
            </div>
            <div class="px-3 flex-1 min-w-0">
                <label for="time" class="block text-sm font-medium leading-6 text-gray-900">Time (local)</label>
                <div class="mt-2">
                    <input
                        id="time"
                        type="time"
                        v-model="form.time"
                        class="font-bold appearance-none block w-full bg-gray-100 text-sky-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-neutral-50"
                    >
                </div>
            </div>
            <div class="px-3 flex-1 min-w-0">
                <label for="pax" class="block text-sm font-medium leading-6 text-gray-900">PAX</label>
                <div class="mt-2">
                    <input
                        id="pax"
                        type="number"
                        v-model="form.pax"
                        min="1"
                        max="4"
                        class="font-bold appearance-none block w-full bg-gray-100 text-sky-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-neutral-50"
                    >
                </div>
            </div>
            <div class="px-3 place-self-end">
                <button
                    @click="$emit('add-leg')"
                    type="button"
                    class="text-sky-500 hover:text-sky-400 text-2xl px-2.5 py-3 font-bold rounded focus:outline-none focus:shadow-outline"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </button>
                <button
                    v-if="canRemove"
                    @click="$emit('remove-leg')"
                    class="text-red-500 hover:text-red-400 px-2.5 py-3 font-bold rounded focus:outline-none focus:shadow-outline"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
            </div>
        </div>
    </form>
</template>

  
    
<script setup>
import { defineProps, defineEmits, ref } from 'vue';

defineProps({
    canRemove: Boolean
});
    
const form = ref({
    from: 'EPWA',
    to: 'LROP',
    date: '2024-01-31',
    time: '09:00',
    pax: 1,
});

defineEmits(['add-leg', 'remove-leg']);

const emitUpdateLeg = () => {
    emits('update-leg', props.leg);
};

const emitRemoveLeg = () => {
    emits('remove-leg');
};
    
const submitForm = () => {
    // Handle the form submission, e.g., make an API call
    console.log('Form data:', form.value);
    // Add your submission logic here
};
</script>
    