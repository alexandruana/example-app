<! - resources/views/clients/index.blade.php → 
    <!DOCTYPE html>
    <html>

    <head>
        <title>Customers</title>
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
                    <h1 class="text-xl font-bold">Customers</h1>
                    <a class="ms-3 bg-sky-500 text-white text-black px-3 py-2"
                        href="{{ route('clients.create') }}">Create</a>

                </div>
                <table class="table-auto shadow-sm overflow-hidden my-8 rounded-xl w-full">
                    <thead class="bg-slate-600 text-white">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">First name</th>
                            <th class="px-6 py-3">Last name</th>
                            <th class="px-6 py-3">Date of Birth</th>
                            <th class="px-6 py-3">Nationality</th>
                            <th class="px-6 py-3">Doc. Type</th>
                            <th class="px-6 py-3">Doc. No.</th>
                            <th class="px-6 py-3">Doc. Expiry</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-slate-200 dark:bg-slate-800">
                        @foreach ($clients as $client)
                            <tr>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($client->id) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($client->first_name) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($client->last_name) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($client->dob) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($client->nationality) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($client->doc_type) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($client->doc_number) }}
                                </td>
                                <td class="px-6 py-3 text-center">
                                    {{ ucwords($client->doc_expiry) }}
                                </td>
                                <td class="px-6 py-3 flex items-center">
                                    <a class="ms-3 bg-sky-500 text-white text-black px-3 py-2 h-10"
                                        href="{{ route('clients.edit', $client->id) }}">
                                        Edit
                                    </a>
                                    <form method="post" class="pt-4s"
                                        action="{{ route('clients.destroy', $client->id) }}">
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