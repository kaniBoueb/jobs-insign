<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poste;

class PosteController extends Controller
{
    public function AllPostes(){
        $postes = Poste::latest()->get();
        return view('extra.postes',compact('postes'));
    }

    public function AddPostes(){
        return view('extra.add-postes');
    }

    public function AddPoste(Request $request){
        Poste::insert([
            'poste_name' => $request->poste_name,
            'poste_slug' => strtolower(str_replace(' ','-',$request->poste_name)),
        ]);

        notify()->success('Poste enregistré avec succès');

        return redirect()->route('all.postes');
    }

    // public function EditPoste($id){
    //     $post = Poste::findOrFail($id);
    //     return view('extra.edit-poste', compact('post'));
    // }

    // public function UpdatePoste(Request $request){
    //     $post_id = $request->id;
    //     Poste::findOrFail($post_id)->update([
    //         'poste_name' => $request->poste_name,
    //         'poste_slug' => strtolower(str_replace(' ','-',$request->poste_name)),
    //     ]);

    //     notify()->success('Poste modifié avec succès');


    //     return redirect()->route('all.postes');
    // }

    public function DeletePoste($id){
        $post = Poste::findOrFail($id);

        $post->delete();

        notify()->success('Poste supprimé avec succès');

        return redirect()->route('all.postes');
    }
} 