@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($candidatures)> 0)
            <div class="head-page d-flex justify-content-between py-3">
                <h2>Liste des candidatures </h2>
                <p class="text-red-500">Hello</p>
            </div>
        @else
            <div class="head-page d-flex justify-center py-3" style="flex-direction: column; width: 800px; margin: 0 auto">
                <h2 class="m-2">Oups!! il n' y a pas d'candidatures disponibles pour l'instant...</h2>
            </div>
        @endif
    </div>
@endsection