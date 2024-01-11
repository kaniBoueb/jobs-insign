@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($countries)> 0)
            <div class="head-page d-flex justify-content-between py-3">
                <h2>Liste des Pays </h2>
                <a href="{{ route('add.country')}}" class="btn text-light" id="new" style="background: #18224F;">Ajouter un pays</a>
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
                        @foreach ($countries as $country)
                        <tr>
                            <td scope="row"> {{ $country->id }} </td>
                            <td> {{ $country->country_name }} </td>
                            <td> {{ $country->country_slug }} </td>
                            <td>
                                {{-- <a href="{{ route('country.edit', $country->id)}}" id="edit"><i class="fa fa-pen text-light"></i></a> --}}
                                <a href="{{ route('country.delete', $country->id)}}" id="delete"><i class="fa fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        {{-- <tr style="height: 15px"></tr> --}}
                        @endforeach     
                    </tbody>
                </table>

            {{-- {{ $countries->links() }} --}}
        @else
        <div class="head-page d-flex justify-center py-3" style="flex-direction: column; width: 800px; margin: 0 auto">
            <h2 class="m-2">Oups!! il n' y a pas de pays disponible pour l'instant...</h2>
            <a href="{{ route('add.country')}}" class="btn text-light" id="new" style="background: #18224F;">Ajouter un pays</a>
        </div>
        @endif
    </div>
@endsection