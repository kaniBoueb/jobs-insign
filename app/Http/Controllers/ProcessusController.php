<?php

namespace App\Http\Controllers;

use App\Models\Processus;
use Illuminate\Http\Request;

class ProcessusController extends Controller
{
    public function AllProcess(){
        $process = Processus::latest()->get();
        return view('extra.process',compact('process'));
    }

    public function AddProcess(){
        return view('extra.add-process');
    }

    public function AddProcessus(Request $request){
        Processus::insert([
            'process_name' => $request->process_name,
            'process_slug' => strtolower(str_replace(' ','-',$request->process_name)),
        ]);

        notify()->success('Processus enregistré avec succès');

        return redirect()->route('all.process');
    }

    // public function EditProcessus($id){
    //     $post = Processus::findOrFail($id);
    //     return view('extra.edit-processus', compact('post'));
    // }

    // public function UpdateProcessus(Request $request){
    //     $post_id = $request->id;
    //     Processus::findOrFail($post_id)->update([
    //         'processus_name' => $request->processus_name,
    //         'processus_slug' => strtolower(str_replace(' ','-',$request->processus_name)),
    //     ]);

    //     notify()->success('Processus modifié avec succès');


    //     return redirect()->route('all.process');
    // }

    public function DeleteProcessus($id){
        $post = Processus::findOrFail($id);

        $post->delete();

        notify()->success('Processus supprimé avec succès');

        return redirect()->route('all.process');
    }
} 
