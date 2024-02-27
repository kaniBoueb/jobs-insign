<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;


class CountryController extends Controller
{
    public function AllCountries(){
        $countries = Country::latest()->get();
        return view('extra.countries',compact('countries'));
    }

    public function AddCountries(){
        return view('extra.add-countries');
    }

    public function AddCountry(Request $request){
        Country::insert([
            'country_name' => $request->country_name,
            'country_slug' => strtolower(str_replace(' ','-',$request->country_name)),
        ]);

        notify()->success('Pays enregistré avec succès');

        return redirect()->route('all.countries');
    }

    // public function EditCountry($id){
    //     $post = Country::findOrFail($id);
    //     return view('extra.edit-country', compact('post'));
    // }

    // public function UpdateCountry(Request $request){
    //     $post_id = $request->id;
    //     Country::findOrFail($post_id)->update([
    //         'country_name' => $request->country_name,
    //         'country_slug' => strtolower(str_replace(' ','-',$request->country_name)),
    //     ]);

    //     notify()->success('Country modifié avec succès');


    //     return redirect()->route('all.countries');
    // }

    public function DeleteCountry($id){
        $post = Country::findOrFail($id);

        $post->delete();

        notify()->success('Pays supprimé avec succès');

        return redirect()->route('all.countries');
    }
} 
