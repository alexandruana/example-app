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
                                <th class="text-left">
                                    First Name
                                </th>
                                <th class="text-left">
                                    Last Name
                                </th>
                                <th>
                                    DOB
                                </th>
                                <th>
                                    Nationality
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{ $client->first_name }}
                                </td>
                                <td>
                                    {{ $client->last_name }}
                                </td>
                                <td class="text-center">
                                    {{ $client->dob }}
                                </td>
                                <td class="text-center">
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
                                <th class="text-left">
                                    Company Name
                                </th>
                                <th class="text-left">
                                    Company Tax ID
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($client->company)
                            <tr>
                                <td class="text-left">
                                    {{ $client->company->company_name }}
                                </td>
                                <td class="text-left">
                                    {{ $client->company->company_tax_id }}
                                </td>
                            </tr>
                            @else
                            <tr>
                                <td>This client is not associated with any company.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>