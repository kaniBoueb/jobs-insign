@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($offres)> 0)
            <h2>Liste des offres </h2> 
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"> Référence de l'offre </th>
                        <th scope="col"> Titre </th>
                        <th scope="col"> Date d'émission </th>
                        <th scope="col"> Date d'échéance </th>
                        <th scope="col"> Nombre de candidats </th>
                        <th scope="col"> Actions </th>
                    </tr>
                </thead>
                
                <tbody>
                        @foreach ($offres as $offre)
                        <tr>
                            <th scope="row"> {{ $offre->id }} </th>
                            <td> {{ $offre->reference_offre }} </td>
                            <td> {{ $offre->titre }} </td>
                            <td> {{ $offre->date_emission }} </td>
                            <td> {{ $offre->date_echeance }} </td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforeach     
                    </tbody>
                </table>

            {{ $offres->links() }}
        @else
            <h2>Oups!! il n' y a pas d'offres disponible pour l'instant...</h2>
        @endif
    </div>
@endsection