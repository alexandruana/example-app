<template>
    <div>
        <form @submit.prevent="isEditMode ? updateCompany() : addCompany()" class="flex mb-5">
            <div class="mb-3 mr-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="company_name">
                    Company Name <span class="text-red-500">*</span>
                </label>
                <input
                    id="company_name"
                    class="mr-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    v-model="form.company_name" placeholder="Company Name" required
                    type="text"
                >
            </div>
            <div class="mb-3 mr-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="company_street">
                    Street <span class="text-red-500">*</span>
                </label>
                <input
                    id="company_street"
                    class="mr-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    v-model="form.company_street"
                    placeholder="Street"
                    type="text"
                    required
                >
            </div>
            <div class="mb-3 mr-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="company_postcode">
                    Postcode <span class="text-red-500">*</span>
                </label>
                <input
                    id="company_postcode"
                    class="mr-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    v-model="form.company_postcode"
                    placeholder="Postcode"
                    type="text"
                    required
                >
            </div>
            <div class="mb-3 mr-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="company_city">
                    City <span class="text-red-500">*</span>
                </label>
                <input
                    id="company_city"
                    class="mr-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    v-model="form.company_city"
                    placeholder="City"
                    type="text"
                    required
                >
            </div>
            <div class="mb-3 mr-3">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="company_country">
                    Country <span class="text-red-500">*</span>
                </label>
                <input
                    id="company_country"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    v-model="form.company_country"
                    placeholder="Country"
                    type="text"
                    required
                >
            </div>
            <!-- Add more input fields as per your requirements -->
            <!-- ... -->
            <div class="mb-3 align-center justify-center">
                <button
                    class="rounded-full bg-sky-500 py-2 px-6 font-semibold text-white hover:border-white/20 hover:bg-sky-500/60 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-900"
                    type="submit"
                >
                    {{ isEditMode ? 'Update' : 'Create' }}
                </button>
                <button v-if="isEditMode" @click="cancelEdit">Cancel</button>
            </div>
        </form>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Company Name</th>
                    <th class="px-4 py-2">Street</th>
                    <th class="px-4 py-2">Postcode</th>
                    <th class="px-4 py-2">City</th>
                    <th class="px-4 py-2">Country</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="company in companies" :key="company.id">
                    <td class="border px-4 py-2 text-center">{{ company.id }}</td>
                    <td class="border px-4 py-2">{{ company.company_name }}</td>
                    <td class="border px-4 py-2">{{ company.company_street }}</td>
                    <td class="border px-4 py-2">{{ company.company_postcode }}</td>
                    <td class="border px-4 py-2">{{ company.company_city }}</td>
                    <td class="border px-4 py-2">{{ company.company_country }}</td>

                    <!-- Add more data cells as per your requirements -->
                    <!-- ... -->
                    <td class="border px-4 py-2">
                        <button @click="startEdit(company)" class="mr-2 text-amber-500 hover:text-amber-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button @click="deleteCompany(company.id)" class="text-red-500 hover:text-red-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const props = defineProps({
    passengerId: Number
});

const companies = ref([]);
const isEditMode = ref(false);
const currentCompanyId = ref(null);
const form = ref({
    company_name: '',
    company_street: '',
    company_postcode: '',
    company_city: '',
    company_country: ''
    // Add more form fields as per your requirements
    // ...
});

// Fetch companies on component mount
onMounted(() => {
    fetchCompanies();
});

const fetchCompanies = async () => {
    try {
        const response = await axios.get(`/api/passengers/${props.passengerId}/companies`);
        companies.value = response.data;
    } catch (error) {
        console.error('Error fetching companies:', error);
    }
};

const startEdit = (company) => {
    isEditMode.value = true;
    currentCompanyId.value = company.id;
    form.value = { ...company };
};

const addCompany = async () => {
    // Implementation for adding a company
    try {
        await axios.post(`/api/passengers/${props.passengerId}/companies`, form.value);
        fetchCompanies();
        resetForm();
    } catch (error) {
        console.error('Error adding travel document:', error);
    }
};

const updateCompany = async () => {
    // Implementation for updating a company
    try {
        await axios.put(`/api/passengers/${props.passengerId}/companies/${currentCompanyId.value}`, form.value);
        fetchCompanies();
        resetForm();
    } catch (error) {
        console.error('Error updating company:', error);
    }
};

const deleteCompany = async (companyId) => {
    // Implementation for deleting a company
    try {
        await axios.delete(`/api/passengers/${props.passengerId}/companies/${companyId}`);
        fetchCompanies();
    } catch (error) {
        console.error('Error deleting company:', error);
    }
};

const resetForm = () => {
    isEditMode.value = false;
    currentCompanyId.value = null;
    form.value = {
        company_name: '',
        company_street: '',
        company_postcode: '',
        company_city: '',
        company_country: ''
        // Reset more form fields as per your requirements
        // ...
    };
};

const cancelEdit = () => {
    resetForm();
};
</script>

<style>
/* Add your component-specific styles here */
</style>
