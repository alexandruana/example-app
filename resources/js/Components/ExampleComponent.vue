<script setup>
import { ref } from 'vue'

const count = ref(0)
</script>

<template>
    <div class="py-12 flex justify-center items-center content-center flex-col align-items-center">
            <div class="w-full">
                <div class="flex justify-between w-full">
                    <h1 class="text-xl font-bold">Customers</h1>
                    <a class="ms-3 text-sky-500 hover:text-green-500  text-black px-3 py-2"
                        href="{{ route('clients.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                    </a>
                </div>
                <div class="relative rounded-xl overflow-hidden -m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-500 uppercase">ID</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-500 uppercase">First name</th>
                                    <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-500 uppercase">Last name</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">DoB</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Nationality</th>
                                    <th scope="col" class="px-6 py-3 text-center text-end text-xs font-bold text-gray-500 uppercase">Company ID</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-slate-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">#</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">#</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">#</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 dark:text-gray-200">#</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 dark:text-gray-200">#</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 dark:text-gray-200">#</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex items-center">
                                            <a 
                                                class="inline-flex items-center px-3 py-2 gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-amber-500 hover:text-green-500 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                href="{{ route('clients.show', $client->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                                </svg>


                                            </a>

                                            <a 
                                                class="inline-flex items-center px-3 py-2 gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-sky-500 hover:text-green-500 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                href="{{ route('clients.edit', $client->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>

                                            </a>
                                            <form method="post" class="pt-4s"
                                                    action="#">
                                                    <button type="submit"
                                                        class="text-red-500 hover:text-green-500 place-self-center px-3 py-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                        </svg>
                                                    </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>