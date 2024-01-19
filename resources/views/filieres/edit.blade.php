<x-app-layout>
   <div class="py-12">
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
         <div wire:id="G8lD1U0drqh7TbUx9VFM" class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1 flex justify-between">
               <div class="px-4 sm:px-0">
                  <h3 class="text-lg font-medium text-gray-900">Filiere</h3>
                  <p class="mt-1 text-sm text-gray-600">
                     Modifier une filiere.
                  </p>
               </div>
               <div class="px-4 sm:px-0">
               </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
               <form action="{{ isset($filiere) ? route('filieres.update', $filiere->id) : route('filieres.store') }}" method="post">
                  <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                     <div class="grid grid-cols-6 gap-6">
                        <!-- Name -->
                        <div class="col-span-6 sm:col-span-4">
                           @csrf
                           @if(isset($filiere))
                           @method('PUT')
                           @endif
                           <label class="block font-medium text-sm text-gray-700" for="name">Nom:</label>
                           <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="nom" name="nom" type="text" value="{{ isset($filiere) ? $filiere->nom : '' }}" >
                        </div>
                     </div>
                  </div>
                  <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                     <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                     Modifier
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
