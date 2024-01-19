
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
            {{-- Étudiants --}}
<h2>Liste des Étudiants</h2>
<center>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Sexe</th>
            <th>Filière</th>
            <th>User</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->id }}</td>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->sexe }}</td>
                <td>{{ $etudiant->filiere->nom }}</td>
                <td>{{ $etudiant->user->name }}</td>
                <td>
                    <!-- <a href="{{ route('etudiants.show', $etudiant->id) }}">Voir</a> -->
                    <a href="{{ route('etudiants.edit', $etudiant->id) }}">Modifier</a>
                    <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</center>


{{-- Lien vers la page de création --}}
<a href="{{ route('etudiants.create') }}">Ajouter un Étudiant</a>
            </div>
        </div>
    </div>
</x-app-layout>
