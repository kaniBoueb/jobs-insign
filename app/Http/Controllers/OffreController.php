<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Country;
use App\Models\Offre;
use App\Models\Poste;
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
        $offres = Offre::latest()->paginate(6);

        return view('offre.index', compact('offres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postes = Poste::latest()->get();
        $countries = Country::latest()->get();
        $contrats = Contrat::latest()->get();

        return view('offre.create', compact('postes', 'contrats', 'countries'));
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
            'contrat_id'=>'required',
            'poste_id'=>'required',
            'country_id'=>'required',
            'description_poste'=>'required',
        ]);

        $offre = new Offre();
        $offre->reference_offre = $request->reference_offre;
        $offre->titre = $request->titre;
        $offre->date_emission = $request->date_emission;
        $offre->date_echeance = $request->date_echeance;
        $offre->contrat_id = $request->contrat_id;
        $offre->poste_id = $request->poste_id;
        $offre->country_id = $request->country_id;
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
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offre = Offre::findOrFail($id);
        $postes = Poste::latest()->get();
        $countries = Country::latest()->get();
        $contrats = Contrat::latest()->get();

        return view('offre.edit', compact('offre', 'postes', 'contrats', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Offre::findOrFail($id)->update([
            'reference_offre' => $request->reference_offre,
            'titre' => $request->titre,
            'date_emission' => $request->date_emission,
            'date_echeance' => $request->date_echeance,
            'contrat_id'=>$request->contrat_id,
            'poste_id'=>$request->poste_id,
            'country_id'=>$request->country_id,
            'description_poste' => $request->description_poste,
        ]);

        notify()->success('Offre modifée avec succès');

        return redirect()->route('offre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offre = Offre::findOrFail($id);

        $offre->delete();

        notify()->success('Offre supprimée avec succès');

        return redirect()->route('offre.index');
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
