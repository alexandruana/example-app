<template>
    <div>
        <form @submit.prevent="isEditMode ? updateCompany() : addCompany()" class="flex mb-5">
            <input 
                class="mr-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                v-model="form.company_name" placeholder="Company Name" required
                type="text"
            >
            <input
                class="mr-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                v-model="form.company_street"
                placeholder="Street"
                type="text"
                required
            >
            <!-- Add more input fields as per your requirements -->
            <!-- ... -->
            <button
                class="rounded-full bg-sky-500 py-2 px-6 font-semibold text-white hover:border-white/20 hover:bg-sky-500/60 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-900"
                type="submit"
            >
                {{ isEditMode ? 'Update' : 'Create' }}
            </button>
            <button v-if="isEditMode" @click="cancelEdit">Cancel</button>
        </form>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Company Name</th>
                    <th class="px-4 py-2">Street</th>
                    <!-- Add more columns as per your requirements -->
                    <!-- ... -->
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="company in companies" :key="company.id">
                    <td class="border px-4 py-2 text-center">{{ company.id }}</td>
                    <td class="border px-4 py-2">{{ company.company_name }}</td>
                    <td class="border px-4 py-2">{{ company.company_street }}</td>
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
};

const updateCompany = async () => {
    // Implementation for updating a company
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
