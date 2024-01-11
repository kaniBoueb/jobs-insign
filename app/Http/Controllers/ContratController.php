<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrat;

class ContratController extends Controller
{
    public function AllContrats(){
        $contrats = Contrat::latest()->get();
        return view('extra.contrats',compact('contrats'));
    }

    public function AddContrats(){
        return view('extra.add-contrats');
    }

    public function AddContrat(Request $request){
        Contrat::insert([
            'contrat_name' => $request->contrat_name,
            'contrat_slug' => strtolower(str_replace(' ','-',$request->contrat_name)),
        ]);

        notify()->success('Contrat enregistré avec succès');

        return redirect()->route('all.contrats');
    }

    // public function EditContrat($id){
    //     $post = Contrat::findOrFail($id);
    //     return view('extra.edit-contrat', compact('post'));
    // }

    // public function UpdateContrat(Request $request){
    //     $post_id = $request->id;
    //     Contrat::findOrFail($post_id)->update([
    //         'contrat_name' => $request->contrat_name,
    //         'contrat_slug' => strtolower(str_replace(' ','-',$request->contrat_name)),
    //     ]);

    //     notify()->success('Contrat modifié avec succès');


    //     return redirect()->route('all.contrats');
    // }

    public function DeleteContrat($id){
        $post = Contrat::findOrFail($id);

        $post->delete();

        notify()->success('Contrat supprimé avec succès');

        return redirect()->route('all.contrats');
    }
} 