<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Filiere;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiants.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $filieres = Filiere::all();
        return view('etudiants.create', compact('users', 'filieres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:male,female',
            'filiere_id' => 'required|exists:filieres,id',
        ]);


        $etudiant = Etudiant::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'sexe' => $request->input('sexe'),
            'filiere_id' => $request->input('filiere_id'),
        ]);

        $user = User::create([
            'name' => $etudiant->nom . ' ' . $etudiant->prenom,
            'email' => $etudiant->nom . '' . $etudiant->prenom . '@ensi.com', 
            'password' => bcrypt('test321123'), 
            'role' => 'student',
        ]);

        $etudiant->user_id = $user->id;
        $etudiant->save();

        return redirect()->route('etudiants.index')->with('success', 'Nouvel étudiant créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Fetch the specific Etudiant
        $etudiant = Etudiant::findOrFail($id);

        // Fetch the list of users
        $users = User::all();
        $filieres = Filiere::all();

        // Pass the Etudiant and list of users to the view
        return view('etudiants.edit', compact('etudiant', 'users', 'filieres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:male,female',
            'filiere_id' => 'required|exists:filieres,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->sexe = $request->input('sexe');
        $etudiant->filiere_id = $request->input('filiere_id');
        $etudiant->user_id = $request->input('user_id');
        $etudiant->save();

        return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Suppression de l'étudiant
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        // Redirection avec un message flash
        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès');
    
    }
}
