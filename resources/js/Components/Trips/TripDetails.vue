<template>
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-12">
      <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
          <h3 class="text-lg leading-6 font-medium text-gray-900">
            Trip Details
          </h3>
          <button @click="goBack" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
            Back
          </button>
        </div>
        <div class="border-t border-gray-200">
          <dl>
            <div v-for="(value, key) in trip" :key="key" class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">
                {{ key }}
              </dt>
              <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                {{ value }}
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps, defineEmits } from 'vue';
  
  // Define the props that TripDetails expects to receive
  const props = defineProps({
    trip: Object
  });
  
  const emit = defineEmits(['back']);
  
  const goBack = () => {
    emit('back');
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  </style>
  