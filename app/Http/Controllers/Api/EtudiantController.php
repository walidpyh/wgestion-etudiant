<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::all();
        return response()->json(['data' => $etudiants]);
    }

    public function show($id)
    {
        $etudiant = Etudiant::with('user')->find($id);

        if (!$etudiant) {
            return response()->json(['error' => 'Etudiant not found'], 404);
        }

        return response()->json(['data' => $etudiant]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:male,female',
            'filiere_id' => 'required|exists:filieres,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $etudiant = Etudiant::create($data);

        return response()->json(['data' => $etudiant], 201);
    }

    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::find($id);

        if (!$etudiant) {
            return response()->json(['error' => 'Etudiant not found'], 404);
        }

        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:male,female',
            'filiere_id' => 'required|exists:filieres,id',
            'user_id' => 'required|exists:users,id',
            // Add validation rules for other fields
        ]);

        $etudiant->update($data);

        return response()->json(['data' => $etudiant]);
    }

    public function destroy($id)
    {
        $etudiant = Etudiant::find($id);

        if (!$etudiant) {
            return response()->json(['error' => 'Etudiant not found'], 404);
        }

        $etudiant->delete();

        return response()->json(['message' => 'Etudiant deleted']);
    }
}
