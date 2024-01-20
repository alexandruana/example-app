<template>
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" @click.self="$emit('close-modal')">
        <div class="relative top-20 mx-auto p-5 border w-3/4 shadow-lg rounded-md bg-white">
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 border-b-4 border-sky-200">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Edit Passenger</h3>
                    <form @submit.prevent="updatePassenger" class="w-1/3 mb-5">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">First Name</label>
                            <input v-model="editData.first_name" type="text" id="first_name" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="middle_name">Middle Name</label>
                            <input v-model="editData.middle_name" type="text" id="middle_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">Last Name</label>
                            <input v-model="editData.last_name" type="text" id="last_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="date_of_birth">Date of Birth</label>
                            <input v-model="editData.date_of_birth" type="text" id="date_of_birth" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nationality">Nationality</label>
                            <input v-model="editData.nationality" type="text" id="nationality" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <span class="block text-gray-700 text-sm font-bold mb-2">Gender</span>
                            <label class="inline-flex items-center">
                            <input type="radio" class="form-radio" name="gender" value="Male" v-model="editData.gender">
                            <span class="ml-2">Male</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                            <input type="radio" class="form-radio" name="gender" value="Female" v-model="editData.gender">
                            <span class="ml-2">Female</span>
                            </label>
                        </div>
                        <!-- Remaining fields... -->
                        <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Save Changes
                        </button>
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" @click="$emit('close-modal')">
                            Cancel
                        </button>
                        </div>
                    </form>
                </div>
                <div class="col-span-2">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Travel Documents</h3>
                    <!-- Travel Document Manager Section -->
                    <TravelDocumentManager :passengerId="passenger.id"/>
                </div>
            </div>
        </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps, ref } from 'vue';
  import { Inertia } from '@inertiajs/inertia';
  import TravelDocumentManager from '@/Components/Client/TravelDocumentManager.vue';

  const props = defineProps({
    passenger: Object,
  });
  
    const editData = ref({ ...props.passenger });
    const emit = defineEmits(['close-modal']);
  
    function updatePassenger() {
        // Assuming editData contains the updated passenger data
        Inertia.put(`/passengers/${editData.value.id}`, editData.value, {
            onSuccess: () => {
            console.log('Passenger updated successfully');
            emit('close-modal');
            },
            onError: errors => {
            console.log('Error updating passenger:', errors);
            // Handle any errors, e.g., showing error messages in the UI
            }
        });
    }

  </script>
  