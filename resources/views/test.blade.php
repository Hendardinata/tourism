@extends('template.app')
@section('content')

<style>
    .card{
        display: inline-block;
        margin-right: 10px;
    }
</style>

@foreach ($data as $d)
<div class="card" style="width: 18rem;">
    <img src="{{ asset('storage/image-destination/'.$d->image) }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><b>{{ $d->title }}</b></h5>
      <p class="card-text">{{ $d->content }}</p>
      <p class="card-text">Rp. <b>{{ $d->price }}</b></p>
      <a href="" class="btn btn-info">{{ $d->status }}</a>
    </div>
  </div>
@endforeach

@endsection

{{-- @section('main')
    <h4 class="pt-2">Ratings</h4>
    <p>Rata-rata Rating: {{ number_format($averageRating, 2) }}</p>
    <ul class="list-unstyled">
        @forelse($d->ratings as $rating)
            <li>
                <strong>Rating: </strong> {{ $rating->rating }}<br>
                <strong>Review: </strong> {{ $rating->review }}
            </li>
        @empty
            <li>Belum ada rating.</li>
        @endforelse
    </ul>
@endsection --}}
