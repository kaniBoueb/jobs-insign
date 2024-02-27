@extends('layouts.nav')

@section('content')
    <div class="container my-4">
        <section class="candidature-form">
            <div class="offre-card" style="margin: 0 auto;">
                <h1 class="title-page">Candidater pour le poste de {{ $offre->titre }}</h1>
                <form action="{{ route('candidature.store')}}" method="POST" class="row" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="form-control" name="offre_id" value="{{ $offre->id }}">
                    <input type="hidden" class="form-control" name="process_id" value="1">
                    <div class="form-group col-md-6 my-3">
                        <label for="cand_cv" class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="cand_prenom" placeholder="John">
                    </div>
                    <div class="form-group col-md-6 my-3">
                        <label for="cand_cv" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="cand_name" placeholder="Doe">
                    </div>

                    <div class="form-group col-md-6 my-3">
                        <label for="cand_cv" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="cand_email" placeholder="john.doe@insign.africa">
                    </div>
                    <div class="form-group col-md-6 my-3">
                        <label for="cand_cv" class="form-label">Téléphone</label>
                        <input type="number" class="form-control" name="cand_num" placeholder="77 123 45 67">
                    </div>

                    <div class="form-group col-md-6 my-3">
                        <label for="cand_cv" class="form-label">CV</label>
                        <input type="file" class="form-control" name="cand_cv" placeholder="Votre CV">
                    </div>
                    <div class="form-group col-md-12 my-5">
                        <button class="btn btn-success">Soumettre</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection