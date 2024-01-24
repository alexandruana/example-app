<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PassengerTable from '@/Components/Client/PassengerTable.vue';
import { defineProps } from 'vue';
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';



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
    <Head title="Passengers" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
