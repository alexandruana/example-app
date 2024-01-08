<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $client->first_name }} {{ $client->last_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap -mx-2">
            <div class="w-full md:w-1/2 px-2 mb-4">
                <h1 class="text-xl font-bold mb-4">Client Details</h1>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    First Name
                                </th>
                                <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Last Name
                                </th>
                                <th class="text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    DOB
                                </th>
                                <th class="text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nationality
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="whitespace-nowrap text-left text-sm text-gray-500">
                                    {{ $client->first_name }}
                                </td>
                                <td class="whitespace-nowrap text-left text-sm text-gray-500">
                                    {{ $client->last_name }}
                                </td>
                                <td class="whitespace-nowrap text-left text-sm text-gray-500">
                                    {{ $client->dob }} <!-- Assuming 'dob' is a Carbon instance -->
                                </td>
                                <td class="whitespace-nowrap text-left text-sm text-gray-500">
                                    {{ $client->nationality }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="w-full md:w-1/2 px-2 mb-4">
                <h2 class="text-lg font-bold mb-4">Company Details</h2>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Company Name
                                </th>
                                <th class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Company Tax ID
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        {{-- Debugging --}}
                        @dump($client->companies)
                            @forelse ($client->companies as $company)
                                <tr>
                                    <td class="whitespace-nowrap text-left text-sm text-gray-500">
                                        {{ $company->company_name ?? 'N/A' }}
                                    </td>
                                    <td class="whitespace-nowrap text-left text-sm text-gray-500">
                                        {{ $company->company_tax_id ?? 'N/A' }}
                                    </td>
                                </tr>
                            @empty
                                <p>No companies found for this client.</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>