



<x-app-layout>
   <div class="py-12">
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
         <div wire:id="G8lD1U0drqh7TbUx9VFM" class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1 flex justify-between">
               <div class="px-4 sm:px-0">
                  <h3 class="text-lg font-medium text-gray-900">Étudiant</h3>
                  <p class="mt-1 text-sm text-gray-600">
                  Modification d'Étudiant
                  </p>
               </div>
               <div class="px-4 sm:px-0">
               </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
               <form action="{{ isset($etudiant) ? route('etudiants.update', $etudiant->id) : route('etudiants.store') }}"  method="post">
                  <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                     <div class="grid grid-cols-6 gap-6">
                        @csrf
                        @if(isset($etudiant))
                            @method('PUT')
                        @endif

                        <div class="col-span-6 sm:col-span-4">
                            <label for="nom" class="block font-medium text-sm text-gray-700">Nom de l'Étudiant:</label>
                            <input type="text" name="nom" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="{{ isset($etudiant) ? $etudiant->nom : '' }}" required>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="prenom" class="block font-medium text-sm text-gray-700">Prénom de l'Étudiant:</label>
                            <input type="text" name="prenom" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" value="{{ isset($etudiant) ? $etudiant->prenom : '' }}" required>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="sexe" class="block font-medium text-sm text-gray-700">Sexe de l'Étudiant:</label>
                            <select name="sexe" class="form-select" required>
                                <option value="male" {{ isset($etudiant) && $etudiant->sexe == 'male' ? 'selected' : '' }}>Homme</option>
                                <option value="female" {{ isset($etudiant) && $etudiant->sexe == 'female' ? 'selected' : '' }}>Femme</option>
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="filiere_id" class="block font-medium text-sm text-gray-700">Filière de l'Étudiant:</label>
                            <select name="filiere_id" class="form-select" required>
                                @foreach($filieres as $filiere)
                                    <option value="{{ $filiere->id }}" {{ isset($etudiant) && $etudiant->filiere_id == $filiere->id ? 'selected' : '' }}>{{ $filiere->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <label for="user_id" class="block font-medium text-sm text-gray-700">Utilisateur associé:</label>
                            <select name="user_id" class="form-select" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ isset($etudiant) && $etudiant->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
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
