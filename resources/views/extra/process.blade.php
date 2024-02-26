@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($process)> 0)
            <div class="head-page d-flex justify-content-between py-3">
                <h2>Liste des process </h2>
                <a href="{{ route('add.process')}}" class="btn text-light" id="new" style="background: #18224F;">Ajouter un process</a>
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
                        @foreach ($process as $process)
                        <tr>
                            <td scope="row"> {{ $process->id }} </td>
                            <td> {{ $process->process_name }} </td>
                            <td> {{ $process->process_slug }} </td>
                            <td>
                                {{-- <a href="{{ route('process.edit', $process->id)}}" id="edit"><i class="fa fa-pen text-light"></i></a> --}}
                                <a href="{{ route('process.delete', $process->id)}}" id="delete"><i class="fa fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        {{-- <tr style="height: 15px"></tr> --}}
                        @endforeach     
                    </tbody>
                </table>

            {{-- {{ $process->links() }} --}}
        @else
        <div class="head-page d-flex justify-center py-3" style="flex-direction: column; width: 800px; margin: 0 auto">
            <h2 class="m-2">Oups!! il n' y a pas de process disponible pour l'instant...</h2>
            <a href="{{ route('add.process')}}" class="btn text-light" id="new" style="background: #18224F;">Ajouter un process</a>
        </div>
        @endif
    </div>
@endsection