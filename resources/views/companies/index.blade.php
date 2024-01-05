<! - resources/views/clients/index.blade.php → 
    <!DOCTYPE html>
    <html>

    <head>
        <title>Companies</title>
        <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body>
        <a href="{{url('/')}}">
            <button class="bg-sky-500 my-2 mx-2 text-white text-black px-3 py-2 h-10" type="submit">Home</button>
        </a>
        <a href="{{url('/clients')}}">
            <button class="bg-sky-500 my-2 mx-2 text-white text-black px-3 py-2 h-10" type="submit">Clients</button>
        </a>
        <a href="{{url('/companies')}}">
            <button class="bg-sky-500 my-2 mx-2 text-white text-black px-3 py-2 h-10" type="submit">Companies</button>
        </a>
        <div
            class="flex justify-center  items-center content-center flex-col align-items-center min-h-screen">
            <div class="w-1/2">
                <div class="flex justify-between w-full">
                    <h1 class="text-xl font-bold">Companies</h1>
                    <a class="ms-3 bg-sky-500 text-white text-black px-3 py-2"
                        href="{{ route('companies.create') }}">Create</a>

                </div>
                <table class="table-auto shadow-sm overflow-hidden my-8 rounded-xl w-full">
                    <thead class="bg-slate-600 text-white">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Company Name</th>
                            <th class="px-6 py-3">Company Street</th>
                            <th class="px-6 py-3">Company Postcode</th>
                            <th class="px-6 py-3">Company City</th>
                            <th class="px-6 py-3">Company Country</th>
                            <th class="px-6 py-3">Company Tax ID.</th>
                            <th class="px-6 py-3">Client ID.</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-slate-200 dark:bg-slate-800">
                        @foreach ($companies as $company)
                            <tr>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($company->id) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($company->company_name) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($company->company_street) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($company->company_postcode) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($company->company_city) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($company->company_country) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($company->company_tax_id) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($company->client_id) }}
                                </td>
                                <td class="px-6 py-3 flex items-center">
                                    <a class="ms-3 bg-sky-500 text-white text-black px-3 py-2 h-10"
                                        href="{{ route('companies.edit', $company->id) }}">
                                        Edit
                                    </a>
                                    <form method="post" class="pt-4s"
                                        action="{{ route('companies.destroy', $company->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="ms-3  bg-red-500 text-white text-black place-self-center px-3 py-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>