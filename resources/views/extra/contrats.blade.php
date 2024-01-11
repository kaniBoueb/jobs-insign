@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($contrats)> 0)
            <div class="head-page d-flex justify-content-between py-3">
                <h2>Liste des contrats </h2>
                <a href="{{ route('add.contrat')}}" class="btn text-light" id="new" style="background: #18224F;">Ajouter un contrat</a>
            </div>
            <table class="table table-striped my-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"> Titre </th>
                        <th scope="col"> Slug </th>
                        <th scope="col"> Actions </th>
                    </tr>
                </thead>
                
                <tbody>
                        @foreach ($contrats as $contrat)
                        <tr>
                            <td scope="row"> {{ $contrat->id }} </td>
                            <td> {{ $contrat->contrat_name }} </td>
                            <td> {{ $contrat->contrat_slug }} </td>
                            <td>
                                {{-- <a href="{{ route('contrat.edit', $contrat->id)}}" id="edit"><i class="fa fa-pen text-light"></i></a> --}}
                                <a href="{{ route('contrat.delete', $contrat->id)}}" id="delete"><i class="fa fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        {{-- <tr style="height: 15px"></tr> --}}
                        @endforeach     
                    </tbody>
                </table>

            {{-- {{ $contrats->links() }} --}}
        @else
        <div class="head-page d-flex justify-center py-3" style="flex-direction: column; width: 800px; margin: 0 auto">
            <h2 class="m-2">Oups!! il n' y a pas de contrats disponible pour l'instant...</h2>
            <a href="{{ route('add.contrat')}}" class="btn text-light" id="new" style="background: #18224F;">Ajouter un contrat</a>
        </div>
        @endif
    </div>
@endsection