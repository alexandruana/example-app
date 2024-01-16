	<template>
	<div class="container mx-auto p-4">
		<form @submit.prevent="submitForm" class="w-full max-w-lg">
			<div class="flex flex-wrap -mx-3 mb-6">
				<div class="w-full px-3">
					<label 
						class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" 
						for="document_type">
							Document Type
					</label>
					<input 
						v-model="travelDocument.document_type" 
						class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						type="text"
						placeholder="Document Type">
				</div>
				<div class="w-full px-3">
					<label
						class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
						for="country">
							Country
					</label>
					<input
						v-model="travelDocument.country"
						class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						type="text"
						placeholder="Issuing Country">
				</div>
				<div class="w-full px-3">
					<label
						class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
						for="document_number">
							Document Number
					</label>
					<input
						v-model="travelDocument.document_number"
						class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						type="text"
						placeholder="Number">
				</div>
				<div class="w-full px-3">
					<label
						class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
						for="issuing_date">
							Issuing Date
					</label>
					<input
						v-model="travelDocument.issuing_date"
						class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						type="date"
						placeholder="Enter Issuing Date">
				</div>
				<div class="w-full px-3">
					<label
						class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
						for="expiry_date">
							Expiry Date
					</label>
					<input
						v-model="travelDocument.expiry_date"
						class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
						type="date"
						placeholder="Enter Issuing Date">
				</div>
			</div>
			<!-- Repeat the above div for each field ('country', 'document_number', etc.) with appropriate type and placeholder -->
			<div class="w-full px-3">
				<label
					class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
					for="isPrimary">
					Primary Document
				</label>
				<input
					v-model="travelDocument.isPrimary"
					class="leading-tight"
					type="checkbox">
			</div>

			<div class="flex items-center justify-between">
				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
					Add Document
				</button>
			</div>
		</form>
	</div>
	</template>

	<script setup>
	import { ref } from 'vue';
	import { Inertia } from '@inertiajs/inertia';

	const props = defineProps({
		passengerId: {
			type: [String, Number],
			required: true
		}
	});

	const travelDocument = ref({
		passenger_id: props.passengerId,
		document_type: '',
		country: '',
		document_number: '',
		issuing_date: '',
		expiry_date: '',
		isPrimary: false,
	});

	const submitForm = () => {
		// Determine if it's an update or a new document based on some criteria, e.g., id
		if (travelDocument.value.id) {
			Inertia.put(`/travel-documents/${travelDocument.value.id}`, travelDocument.value);
		} else {
			Inertia.post('/travel-documents', travelDocument.value);
		}

		// No need to manually handle the response here, Inertia.js handles it
	};
	</script>

	<style scoped>
	/* Additional custom styling if needed */
	</style>
