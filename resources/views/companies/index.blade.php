<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Companies
        </h2>
    </x-slot>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap -mx-2">
        <div
            class="py-12 flex justify-center items-center content-center flex-col align-items-center">
                <div class="w-full">
                    <div class="flex justify-between w-full">
                        <h1 class="text-xl font-bold">Companies</h1>
                        <a class="ms-3 text-sky-500 hover:text-green-500 px-3 py-2"
                            href="{{ route('companies.create') }}">
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
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-500 uppercase text-left">Company Name</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-500 uppercase text-left">Company Street</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-500 uppercase">Company Postcode</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-500 uppercase">Company City</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-500 uppercase">Company Country</th>
                                            <th scope="col" class="px-6 py-3 text-start text-xs font-bold text-gray-500 uppercase">Company Tax ID.</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-slate-800">
                                        @foreach ($companies as $company)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200 text-left">
                                                    {{ ucwords($company->id) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200 text-left">
                                                    {{ ucwords($company->company_name) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    {{ ucwords($company->company_street) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    {{ ucwords($company->company_postcode) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    {{ ucwords($company->company_city) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    {{ ucwords($company->company_country) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    {{ ucwords($company->company_tax_id) }}
                                                </td>
                                                <td class="px-6 py-4 flex items-center whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    <a class="text-sky-500 hover:text-green-500 px-3 py-2 h-10"
                                                        href="{{ route('companies.edit', $company->id) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                        </svg>
                                                    </a>
                                                    <form method="post" class="pt-4s"
                                                        action="{{ route('companies.destroy', $company->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="text-red-500 hover:text-green-500 place-self-center px-3 py-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>