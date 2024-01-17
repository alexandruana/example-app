	<template>
	<div class="container mx-auto">
		<form @submit.prevent="submitForm" class="">
			<div class="flex flex-wrap -mx-3 mb-6">
				<div class="px-3">
					<label 
						class="block text-gray-700 text-sm font-bold mb-2" 
						for="document_type">
							Document Type
					</label>
					<input 
						v-model="travelDocument.document_type" 
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						type="text"
						placeholder="Document Type">
				</div>
				<div class="px-3">
					<label
						class="block text-gray-700 text-sm font-bold mb-2"
						for="country">
							Country
					</label>
					<input
						v-model="travelDocument.country"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						type="text"
						placeholder="Issuing Country">
				</div>
				<div class="px-3">
					<label
						class="block text-gray-700 text-sm font-bold mb-2"
						for="document_number">
							Document Number
					</label>
					<input
						v-model="travelDocument.document_number"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						type="text"
						placeholder="Number">
				</div>
				<div class="px-3">
					<label
						class="block text-gray-700 text-sm font-bold mb-2"
						for="issuing_date">
							Issuing Date
					</label>
					<input
						v-model="travelDocument.issuing_date"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						type="date"
						placeholder="Enter Issuing Date">
				</div>
				<div class="px-3">
					<label
						class="block text-gray-700 text-sm font-bold mb-2"
						for="expiry_date">
							Expiry Date
					</label>
					<input
						v-model="travelDocument.expiry_date"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						type="date"
						placeholder="Enter Issuing Date">
				</div>
				<div class="px-3">
					<label
						class="block text-gray-700 text-sm font-bold mb-2"
						for="isPrimary">
						Default
					</label>
					<input
						v-model="travelDocument.isPrimary"
						class="leading-tight"
						type="checkbox">
				</div>
				<div class="px-3 flex items-end">
					<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
						</svg>
					</button>
				</div>
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
