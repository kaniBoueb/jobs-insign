@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($offres)> 0)
            <h2>Liste des offres </h2> 
            <table class="table">
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
                        <tr style="height: 65px; vertical-align: middle; margin-bottom: 5px; border: 1px solid #dedede">
                            <td style="border: 1px solid #00000000; border-top-left-radius: 50px; border-bottom-left-radius: 50px; text-align: center; color: #fff; background: #14214c; padding: 0 20px; margin-right: 30px" scope="row"> {{ $offre->id }} </td>
                            <td> {{ $offre->reference_offre }} </td>
                            <td> {{ $offre->titre }} </td>
                            <td> {{ $offre->date_emission }} </td>
                            <td> {{ $offre->date_echeance }} </td>
                            <td></td>
                            <td style="background: #14214c; justify-content: center; align-items: center; border-top-right-radius: 50px; border-bottom-right-radius: 50px; border: 1px solid #00000000;">
                                <a href="{{ route('offre.edit', $offre->id)}}" id="edit"><i class="fa fa-pen text-light"></i></a>
                                <a href="{{ route('offre.delete', $offre->id)}}" id="delete"><i class="fa fa-trash text-light"></i></a>
                            </td>
                        </tr>
                        <tr style="height: 15px"></tr>
                        @endforeach     
                    </tbody>
                </table>

            {{ $offres->links() }}
        @else
            <h2>Oups!! il n' y a pas d'offres disponible pour l'instant...</h2>
        @endif
    </div>
@endsection