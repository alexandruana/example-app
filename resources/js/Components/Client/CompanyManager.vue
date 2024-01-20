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
                        <button @click="startEdit(company)">Edit</button>
                        <button @click="deleteCompany(company.id)">Delete</button>
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
        console.error('Error updating travel document:', error);
    }
};

const deleteCompany = async (companyId) => {
    // Implementation for deleting a company
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
