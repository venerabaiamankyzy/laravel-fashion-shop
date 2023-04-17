@extends('layouts.app')

@section('title')
    
@section('content')
  
 
<div class="row row-cols-4">
  @forelse($shoes as $shoe)
  <div class="card-box my-3">
      <div class="card col" style="width: 18rem;">
        <figure>
          <img src="{{ $shoe->image }}" alt="" class="img-fluid p-3">
          <figcaption class="px-3">Dettagli :</figcaption>
        </figure>
        <ul>
      <li>
        <p class="card-text"><span class="fw-bold text-primary"> Marca: </span>{{$shoe->marca}}</p>
      </li>
      <li>
        <p class="card-text"><span class="fw-bold text-primary"> Modello: </span>{{$shoe->modello}}</p>
      </li>
      <li>
        <p class="card-text"><span class="fw-bold text-primary"> Colore: </span>{{$shoe->colore}}</p>
      </li>
      <li>
        <p class="card-text"><span class="fw-bold text-primary"> Taglia: </span>{{$shoe->taglia}}</p>
      </li>
      <li>
        <p class="card-text"><span class="fw-bold text-primary"> Prezzo: </span>{{$shoe->prezzo}}€</p>
      </li>
    </ul>
    <a href="{{ route('shoes.show', $shoe) }}">
        <i class="bi bi-eye-fill me-3 px-3"></i>
        </a>
      </div>      
    </div>
 
    
  @empty
  @endforelse
</div>
  
@endsection


