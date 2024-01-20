<template>
    <div>
        <form @submit.prevent="isEditMode ? updateDocument() : addDocument()" class="flex mb-5">
            <input 
                id="document_type"
                class="md:w-2/6 mr-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                v-model="form.document_type" placeholder="Document Type" required
                type="text"
            >
            <input
                class="md:w-2/6 mr-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                v-model="form.country"
                placeholder="Country"
                type="text"
                required
            >
            <input
                class="w-1/6 mr-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                v-model="form.document_number"
                placeholder="Document Number"
                type="text"
                required            >
            <input
                class="w-1/6 mr-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                v-model="form.issuing_date" 
                placeholder="Issuing Date"
                type="date"
                required
            >
            <input
                class="w-1/6 mr-3 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                v-model="form.expiry_date" 
                placeholder="Expiry Date"
                type="date"
                required
            >
            <label>
                Default
                <input type="checkbox" v-model="form.isDefault" class="text-center">
            </label>
            <button
                class="ml-6 rounded-full bg-sky-500 py-2 px-6 font-semibold text-white hover:border-white/20 hover:bg-sky-500/60 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-900"
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
                    <th class="px-4 py-2">Document Type</th>
                    <th class="px-4 py-2 text-left">Country</th>
                    <th class="px-4 py-2 text-left">Number</th>
                    <th class="px-4 py-2">Expiry Date</th>
                    <th class="px-4 py-2">Default</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="document in travelDocuments" :key="document.id">
                    <td class="border px-4 py-2 text-center">{{ document.id }}</td>
                    <td class="border px-4 py-2 text-center">{{ document.document_type }}</td>
                    <td class="border px-4 py-2 text-left">{{ document.country }}</td>
                    <td class="border px-4 py-2">{{ document.document_number }}</td>
                    <td class="border px-4 py-2 text-center">{{ document.expiry_date }}</td>
                    <td class="border px-4 py-2 text-center">{{ document.isDefault }}</td>
                    <td class="border px-4 py-2 text-center">
                        <button @click="startEdit(document)" class="mr-2 text-amber-500 hover:text-amber-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                        <button @click="deleteDocument(document.id)" class="text-red-500 hover:text-red-300">
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
  
  const travelDocuments = ref([]);
  const isEditMode = ref(false);
  const currentDocumentId = ref(null);
  const form = ref({
        document_type: '',
        country: '',
        document_number: '',
        issuing_date: '',
        expiry_date: '',
        isDefault: false
  });
  
  // Fetch travel documents on component mount
  onMounted(() => {
      fetchTravelDocuments();
  });
  
  const fetchTravelDocuments = async () => {
      try {
          const response = await axios.get(`/api/passengers/${props.passengerId}/travelDocuments`);
          travelDocuments.value = response.data;
      } catch (error) {
          console.error('Error fetching travel documents:', error);
      }
  };
  
  const startEdit = (document) => {
      isEditMode.value = true;
      currentDocumentId.value = document.id;
      form.value = { ...document };
  };
  
  const addDocument = async () => {
        try {
            await axios.post(`/api/passengers/${props.passengerId}/travelDocuments`, form.value);
            fetchTravelDocuments();
            resetForm();
        } catch (error) {
            console.error('Error adding travel document:', error);
        }
    };
  
  const updateDocument = async () => {
        try {
            await axios.put(`/api/passengers/${props.passengerId}/travelDocuments/${currentDocumentId.value}`, form.value);
            fetchTravelDocuments();
            resetForm();
        } catch (error) {
            console.error('Error updating travel document:', error);
        }
  };
  
  const deleteDocument = async (documentId) => {
      try {
          await axios.delete(`/api/passengers/${props.passengerId}/travelDocuments/${documentId}`);
          fetchravelDocuments();
      } catch (error) {
          console.error('Error deleting travel document:', error);
      }
  };
  
  const resetForm = () => {
      isEditMode.value = false;
      currentDocumentId.value = null;
      form.value = {
            document_type: '',
            country: '',
            document_number: '',
            issuing_date: '',
            expiry_date: '',
            isDefault: false
      };
  };
  
  const cancelEdit = () => {
      resetForm();
  };
  </script>
  
  <style>
  /* Add your component-specific styles here */
  </style>
  