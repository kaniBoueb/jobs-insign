<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $offres = Offre::paginate(6);

        return view('offre.index', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offre.create');
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
            'reference_offre'=>'required',
            'titre'=>'required',
            'date_emission'=>'required',
            'date_echeance'=>'required',
            'contrat'=>'required',
            'fonction'=>'required',
            'pays'=>'required',
            'description_poste'=>'required',
        ]);

        $offre = new Offre();
        $offre->reference_offre = $request->reference_offre;
        $offre->titre = $request->titre;
        $offre->date_emission = $request->date_emission;
        $offre->date_echeance = $request->date_echeance;
        $offre->contrat = $request->contrat;
        $offre->fonction = $request->fonction;
        $offre->pays = $request->pays;
        $offre->description_poste = $request->description_poste;

        $offre->save();

        notify()->success('Offre ajoutée avec succès');
        
        return redirect()->route('offre.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(Offre $offre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit(Offre $offre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offre $offre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offre $offre)
    {
        //
    }

    public function search(Request $request)
    {
        $words = $request->words;

        $offres= Offre::get()
        ->where('title', 'LIKE', "%$words%")
        ->orWhere('description', 'LIKE', "%$words%")
        ->orderBy('created_at', 'desc')
        ->get();

        return response()->json(['success' => true, 'offres' => $offres]);
    }
}
