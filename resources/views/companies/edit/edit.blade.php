<! - resources/views/users/edit/edit.blade.php →
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
                 <h1 class="text-xl font-bold my-2">Edit Company Record</h1>
             </div>
             <hr>
             <form method="post" action="{{ route('companies.update', $company->id) }}">
                 @csrf
                 @method('PUT')
                 <div class="flex flex-col gep-y-2">
                     <label for="company_name">Company Name::</label>
                     <input class="px-2 h-10 border border-black" value="{{ $company->company_name }}" type="text"
                         name="company_name" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="company_street">Company Street:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $company->company_street }}" type="text"
                         name="company_street" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="company_postcode">Company Postcode:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $company->company_postcode }}" type="text"
                         name="company_postcode" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="company_city">Company City:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $company->company_city }}" type="text"
                         name="company_city" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="company_country">Company Country:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $company->company_country }}" type="text"
                         name="company_country" required><br>
                 </div>
                 <div class="flex flex-col gep-y-2">
                     <label for="company_tax_id">Company Tax ID:</label>
                     <input class="px-2 h-10 border border-black" value="{{ $company->company_tax_id }}" type="text"
                         name="company_tax_id"><br>
                 </div>


                 <button class="bg-sky-500 text-white text-black px-3 py-2 h-10" type="submit">Update</button>
             </form>
         </div>
     </div>
 </body>

 </html>