<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ClientForm from '@/Components/Client/ClientForm.vue';
import PassengerTable from '@/Components/Client/PassengerTable.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import { ref } from 'vue';


// Define the props received from the Laravel controller
const props = defineProps({
  passengers: Array
});

const selectedPassenger = ref(null);

const handleEdit = (passenger) => {
  selectedPassenger.value = passenger;
};

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
                <div>
                    <div class="mx-auto mt-5">
                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <PassengerTable :passengers="props.passengers" @edit-passenger="handleEdit"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
