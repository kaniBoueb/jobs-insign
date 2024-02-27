<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Processus;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\CandidatureConfirmation;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AllCandidatures()
    {   
        $candidatures = Candidature::latest()->get();
        return view('candidature.index',compact('candidatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function AddCandidatures($id)
    {
        $offre = Offre::findOrFail($id);
        $process = Processus::latest()->get();
        return view('frontend.home.candidature',compact('offre', 'process'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function AddCandidature(Request $request)
    {
        // Valider les données entrantes
        $validatedData = $request->validate([
            'offre_id' => 'required|exists:offres,id', // Assurez-vous que l'offre_id existe dans la table offres
            'process_id' => 'required|integer', // Assurez-vous que process_id est un entier
            'cand_prenom' => 'required|string|max:100',
            'cand_name' => 'required|string|max:100',
            'cand_email' => 'required|email',
            'cand_num' => 'required|string|max:12',
            'cand_cv' => 'required|file|max:10240|mimes:pdf,doc,docx', // Limitez les types de fichiers autorisés et la taille maximale
        ]);

        // Traitement du fichier CV
        $cvPath = $request->file('cand_cv')->store('cvs');

        // Créer une nouvelle instance de Candidature avec les données validées
        $candidature = new Candidature;
        $candidature->offre_id = $validatedData['offre_id'];
        $candidature->process_id = $validatedData['process_id'];
        $candidature->cand_prenom = $validatedData['cand_prenom'];
        $candidature->cand_name = $validatedData['cand_name'];
        $candidature->cand_email = $validatedData['cand_email'];
        $candidature->cand_num = $validatedData['cand_num'];
        $candidature->cand_cv = $cvPath; // Stockez le chemin du fichier CV
        $candidature->save();

        // Rediriger avec un message de succès
        notify()->success('Votre candidature a été soumise avec succès');

        // $offre = Offre::find($request->offre_id);
        // Envoi de l'e-mail de confirmation
        // Mail::to($validatedData['cand_email'])->send(new CandidatureConfirmation($offre))
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidature $candidature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidature $candidature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidature $candidature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidature $candidature)
    {
        //
    }
}
