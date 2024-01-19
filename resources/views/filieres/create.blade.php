<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Filiere</h3>
                        <p class="mt-1 text-sm text-gray-600">Ajouter une filiere.</p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="{{ isset($filiere) ? route('filieres.update', $filiere->id) : route('filieres.store') }}" method="post">
                        @csrf
                        @if(isset($filiere))
                            @method('PUT')
                        @endif
                        <div class="bg-white shadow-sm sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="p-6">
                                <div class="mb-4">
                                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom:</label>
                                    <input type="text" id="nom" name="nom" value="{{ isset($filiere) ? $filiere->nom : '' }}" class="form-control mt-1">
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end p-6 bg-gray-50 text-right sm:rounded-bl-md sm:rounded-br-md">
                            <button type="submit" class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                                Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
