<template>
    <AuthenticatedLayout>
		<Head title="Trip Details" />
		<div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					<h2 class="text-xl font-semibold">{{ trip.name }}</h2>
					<!-- Display other trip details here -->
				</div>
			</div>
      	</div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head } from '@inertiajs/vue3';
  import { defineProps } from 'vue';
  
  const props = defineProps({
    trip: Object,
  });
  </script>
  