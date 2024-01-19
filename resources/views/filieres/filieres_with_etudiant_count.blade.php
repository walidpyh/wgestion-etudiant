
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px; /* Add margin to the bottom of the table */
    }

    th, td {
        border: 1px solid #ddd; /* Add a 1px solid border to table cells */
        padding: 8px; /* Add padding to the cells for better spacing */
        text-align: left;
    }

    th {
        background-color: #f2f2f2; /* Add a background color to header cells */
    }
</style>

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Filières with Etudiant Count --}}
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Liste des Filières avec le Nombre d'Etudiants</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Nombre d'Etudiants</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($filieresWithCount as $filiere)
                                    <tr>
                                        <td>{{ $filiere->nom }}</td>
                                        <td>{{ $filiere->etudiants_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>

</x-app-layout>
