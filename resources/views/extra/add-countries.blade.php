@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="offre-card" style="width: 800px; margin: 0 auto;">
            <h1 class="title-page">Formulaire d'ajout</h1>
            <form action="{{ route('country.store')}}" method="POST" class="row">
                @csrf
                <div class="form-group col-md-6 my-3">
                    <input type="text" class="form-control" name="country_name" placeholder="Nom du pays">
                </div>
                <div class="form-group col-md-4 my-3">
                    <button class="btn btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection