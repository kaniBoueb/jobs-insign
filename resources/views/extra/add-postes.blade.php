@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="offre-card" style="width: 800px; margin: 0 auto;">
            <h1 class="title-page">Formulaire d'ajout</h1>
            <form action="{{ route('poste.store')}}" method="POST" class="row">
                @csrf
                <div class="form-group col-md-6 my-3">
                    <input type="text" class="form-control" name="poste_name" placeholder="Titre du poste">
                </div>
                <div class="form-group col-md-4 my-3">
                    <button class="btn btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection