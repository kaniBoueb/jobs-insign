@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="offre-card" style="width: 800px; margin: 0 auto;">
            <h1 class="title-page">Modifier l'offre {{ $offre->titre }}</h1>
            <form action="{{ route('offre.update', $offre->id)}}" method="POST" class="row">
                @csrf
                <div class="form-group col-md-6 my-3">
                    <input type="text" class="form-control" name="titre" placeholder="Titre de l'offre" value="{{ $offre->titre }}">
                </div>
                <div class="form-group col-md-6 my-3">
                    <select class="form-select form-control articles-fonction" id="poste_id" name="poste_id">
                        @foreach ($postes as $item)
                            <option value="{{ $item->id }}">{{ $item->poste_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 my-3">
                    <input type="text" class="date_em form-control" id="date_em" name="date_emission" placeholder="Date d'émision" value="{{ $offre->date_emission }}">
                </div>
                <div class="form-group col-md-6 my-3">
                    <input type="text" class="date_ec form-control" id="date_ec" name="date_echeance" placeholder="Date d'échéance" value="{{ $offre->date_echeance }}">
                </div>
                <div class="form-group col-md-6 my-3">
                    <select class="form-select form-control articles-contrat" id="contrat_id" name="contrat_id">
                        @foreach ($contrats as $item)
                            <option value="{{ $item->id }}">{{ $item->contrat_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 my-3">
                    <select class="form-select form-control" id="country_id" name="country_id">
                        @foreach ($countries as $item)
                            <option value="{{ $item->id }}">{{ $item->country_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 my-3">
                    <input type="text" class="form-control" name="reference_offre" id="reference_offre" placeholder="Référence de l'offre" value="{{ $offre->reference_offre }}" >
                </div>
                <div class="form-group col-md-12 my-3">
                    <textarea class="ckeditor form-control" name="description_poste">{{ $offre->description_poste }}</textarea>
                </div>
                <div class="form-group col-md-4 ">
                    <button class="btn btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection