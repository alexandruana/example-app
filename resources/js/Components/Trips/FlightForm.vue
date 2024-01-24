<template>
        <form @submit.prevent="submitForm" class="w-full max-w-4xl bg-sky-950 p-6 rounded-lg shadow-lg">
            <div class="flex flex-wrap -mx-3 items-center">
                <div class="px-3 flex-1 min-w-0">
                    <input type="text" v-model="form.from" class="appearance-none block w-full bg-gray-100 text-sky-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-neutral-200" placeholder="From">
                </div>
                <div class="px-3 flex-1 min-w-0">
                    <input type="text" v-model="form.to" class="appearance-none block w-full bg-gray-100 text-sky-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-neutral-200" placeholder="To">
                </div>
                <div class="px-3 flex-1 min-w-0">
                    <input type="date" v-model="form.departure_date" class="appearance-none block w-full bg-gray-100 text-sky-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-neutral-200">
                </div>
                <div class="px-3 flex-1 min-w-0">
                    <input type="date" v-model="form.return_date" class="appearance-none block w-full bg-gray-100 text-sky-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-neutral-200">
                </div>
                <div class="px-3 flex-1 min-w-0">
                    <select v-model="form.passengers" class="block w-full bg-neutral-200 text-sky-950 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-neutral-200">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <div class="px-3">
                    <button type="submit" class="bg-sky-700 hover:bg-sky-500 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

  
    
    <script setup>
    import { ref } from 'vue';
    
    const form = ref({
        from: '',
        to: '',
        departure_date: '',
        return_date: '',
        passengers: 1,
    });
    
    const submitForm = () => {
        // Handle the form submission, e.g., make an API call
        console.log('Form data:', form.value);
        // Add your submission logic here
    };
    </script>
    
    <style>
    /* Add any additional global styles here */
    </style>
    