<script setup>
import { usePage } from '@inertiajs/vue3';

const { trip } = usePage().props;
</script>

<template>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Trip Details
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Personal details and application.
            </p>
            </div>
            <div class="border-t border-gray-200">
            <dl>
                <!-- Repeat for each trip detail -->
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Trip ID
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                    {{ trip.unique_trip_id }}
                </dd>
                </div>
                <!-- Add more details here -->
            </dl>
            </div>
        </div>
    </div>
</template>
  