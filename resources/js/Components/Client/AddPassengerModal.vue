<script setup>
import { Inertia } from '@inertiajs/inertia';
import { reactive, defineEmits } from 'vue';

const emits = defineEmits(['close-modal']);

const passenger = reactive({
    first_name: '',
    middle_name: '',
    last_name: '',
    date_of_birth: '',
    nationality: '',
    gender: '',
});

function submit() {
    Inertia.post('/post', passenger);
}

const closeModal = () => {
  emits('close-modal');
};

</script>
<template>
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="flex">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Add Passenger</h3>
                <form
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
                    @submit.prevent="submit"
                    >
                    <div class="mb-4">
                        <h4 class="text-lg mb-3">Add Passenger  </h4>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="firstName">
                                First Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                v-model="passenger.first_name"
                                placeholder="First Name"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="middleName">
                                Middle Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                v-model="passenger.middle_name"
                                placeholder="Middle Name"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="lastName">
                                Last Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                v-model="passenger.last_name"
                                placeholder="Last Name"
                            />
                        </div>
                        <!-- Additional fields follow the same pattern -->
                        <div class="mb-3">
                            <!-- Label and input for each field like Email, Phone No., etc. -->
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="dateOfBirth">
                                Date of Birth <span class="text-red-500">*</span>
                            </label>
                            <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                v-model="passenger.date_of_birth"
                                placeholder="Date of Birth"
                            />
                        </div>
                        <div class="mb-3">
                            <!-- Label and input for each field like Email, Phone No., etc. -->
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nationality">
                                Nationality <span class="text-red-500">*</span>
                            </label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                v-model="passenger.nationality"
                                placeholder="Nationality"
                            />
                        </div>
                        <!-- Radio buttons for gender -->
                        <div class="flex items-center mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
                                Gender
                            </label>
                            <div class="flex ml-2">
                                <div class="form-check form-check-inline mr-2">
                                    <input class="form-radio" type="radio" name="gender" value="male" 
                                        v-model="passenger.gender"
                                    />
                                    <label class="ml-2" for="gridRadios1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-radio" type="radio" name="gender" value="female" 
                                        v-model="passenger.gender"
                                    />
                                    <label class="ml-2" for="gridRadios2">
                                        Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            SUBMIT
                        </button>
                        <button
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            @click="closeModal"
                        >
                            Cancel
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>