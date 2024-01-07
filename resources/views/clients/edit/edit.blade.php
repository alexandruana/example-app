<! - resources/views/clients/edit/edit.blade.php →
 <!DOCTYPE html>
 <html>

 <head>
     <title>Edit Client Record</title>
     <script src="https://cdn.tailwindcss.com"></script>

 </head>

 <body class="bg-gray-200">
    <a href="{{url('/')}}">
        <button class="bg-sky-500 my-2 mx-2 text-white text-black px-3 py-2 h-10" type="submit">Home</button>
    </a>
    <div
         class="flex justify-center  items-center content-center flex-col align-items-center min-h-screen border-2 border-black">
         <div class="w-1/4">
             <div class="flex justify-center my-2 w-full">
                 <h1 class="text-xl font-bold my-2">Edit Client Record</h1>
             </div>
             <hr>
             <form method="post" action="{{ route('clients.update', $client->id) }}">
                 @csrf
                 @method('PUT')
                 <div class="flex flex-col gep-y-2">
                     <label for="first_name">First Name:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $client->first_name }}" type="text"
                         name="first_name" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="middle_name">Middle Name:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $client->middle_name }}" type="text"
                         name="middle_name" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="last_name">Last Name:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $client->last_name }}" type="text"
                         name="last_name" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="dob">Date of Birth:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $client->dob }}" type="text"
                         name="dob" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="nationality">Nationality:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $client->nationality }}" type="text"
                         name="nationality" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="doc_type">Doc. Type:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $client->doc_type }}" type="text"
                         name="doc_type" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="doc_number">Document No.:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $client->doc_number }}" type="text"
                         name="doc_number" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="doc_expiry">Doc. Expiry:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $client->doc_expiry }}" type="date"
                         name="doc_expiry" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="company_id">Company ID:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $client->company_id }}" type="number"
                         name="company_id"><br>
                 </div>


                 <button class="bg-sky-500 text-white text-black px-3 py-2 h-10" type="submit">Update</button>
             </form>
         </div>
     </div>
 </body>

 </html>