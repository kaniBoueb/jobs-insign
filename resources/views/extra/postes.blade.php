@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($postes)> 0)
            <div class="head-page d-flex justify-content-between py-3">
                <h2>Liste des postes </h2>
                <a href="{{ route('add.poste')}}" class="btn text-light" id="new" style="background: #18224F;">Ajouter un poste</a>
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
                        @foreach ($postes as $poste)
                        <tr>
                            <td scope="row"> {{ $poste->id }} </td>
                            <td> {{ $poste->poste_name }} </td>
                            <td> {{ $poste->poste_slug }} </td>
                            <td>
                                {{-- <a href="{{ route('poste.edit', $poste->id)}}" id="edit"><i class="fa fa-pen text-light"></i></a> --}}
                                <a href="{{ route('poste.delete', $poste->id)}}" id="delete"><i class="fa fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        {{-- <tr style="height: 15px"></tr> --}}
                        @endforeach     
                    </tbody>
                </table>

            {{-- {{ $postes->links() }} --}}
        @else
        <div class="head-page d-flex justify-center py-3" style="flex-direction: column; width: 800px; margin: 0 auto">
            <h2 class="m-2">Oups!! il n' y a pas de postes disponible pour l'instant...</h2>
            <a href="{{ route('add.poste')}}" class="btn text-light" id="new" style="background: #18224F;">Ajouter un poste</a>
        </div>
        @endif
    </div>
@endsection