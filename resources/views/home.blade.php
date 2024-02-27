@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="section-title style-2 wow animate__animated animate__fadeIn">
        <ul class="nav nav-tabs links" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Boite de réception</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="true">Préselection</button>
            </li>
            {{-- @foreach ($offres as $item)
                <li class="nav-item" role="presentation">
                    <a  class="nav-link" id="nav-tab-two" data-bs-toggle="tab" href="#category{{ $item->id }}" type="button" role="tab" aria-controls="tab-two" aria-selected="false">{{ $item->titre }}</a >
                </li>
            @endforeach --}}
            
        </ul>
    </div>
    <h1 class="text-3xl font-bold underline text-red-300">
        Hello world!
    </h1>
</div>
@endsection
