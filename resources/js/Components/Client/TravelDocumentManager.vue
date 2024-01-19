<template>
    <div>
    <!-- List of Travel Documents -->
    <h2>Travel Documents for Passenger #{{ passengerId }}</h2>
    <ul>
        <li v-for="document in travelDocuments" :key="document.id">
        {{ document.country }} - {{ document.document_number }}
        <button @click="startEdit(document)">Edit</button>
        <button @click="deleteDocument(document.id)">Delete</button>
        </li>
    </ul>

    <!-- Add/Edit Form -->
    <div>
        <h2>{{ editMode ? 'Edit' : 'Add' }} Travel Document</h2>
        <form @submit.prevent="editMode ? updateDocument() : addDocument()">
        <input type="text" v-model="form.country" placeholder="Country" required>
        <input type="text" v-model="form.document_number" placeholder="Document Number" required>
        <input type="date" v-model="form.issuing_date" placeholder="Issuing Date" required>
        <input type="date" v-model="form.expiry_date" placeholder="Expiry Date" required>
        <button type="submit">{{ editMode ? 'Update' : 'Create' }}</button>
        <button v-if="editMode" @click="cancelEdit">Cancel</button>
        </form>
    </div>
    </div>
</template>

<script setup>
import { ref, defineProps } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    passengerId: Number,
    travelDocuments: Array
});

const form = ref({
    country: '',
    document_number: '',
    issuing_date: '',
    expiry_date: ''
});

const editMode = ref(false);
let editingDocumentId = null;

const startEdit = (document) => {
    editMode.value = true;
    editingDocumentId = document.id;
    Object.assign(form.value, document);
};

const addDocument = () => {
    Inertia.post(`/passengers/${props.passengerId}/travelDocuments`, form.value);
    resetForm();
};

const updateDocument = () => {
    Inertia.put(`/passengers/${props.passengerId}/travelDocuments/${editingDocumentId}`, form.value);
    resetForm();
};

const deleteDocument = (documentId) => {
    Inertia.delete(`/passengers/${props.passengerId}/travelDocuments/${documentId}`);
};

const resetForm = () => {
    form.value = { country: '', document_number: '', issuing_date: '', expiry_date: '' };
    editMode.value = false;
    editingDocumentId = null;
};

const cancelEdit = () => {
    resetForm();
};
</script>

<style>
/* Add component-specific styles here */
</style>
