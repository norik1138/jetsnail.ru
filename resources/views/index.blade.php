@extends('layouts/layout')

@section('title', 'Доступный транспорт')

@section('content')
<div class="d-flex justify-content-center flex-wrap">
  @foreach($transports as $transport)
  <div class="card p-3" style="width: 18rem; margin: 15px;">
    <img class="card-img-top"
    @if($transport->kind->transport_kind == 'Легковые авто')
    src="/imgs/Cabriolet.png"
    @elseif($transport->kind->transport_kind == 'Грузовики')
    src="/imgs/Truck.png"
    @elseif($transport->kind->transport_kind == 'Фургоны')
    src="/imgs/Lorry.png"
    @elseif($transport->kind->transport_kind == 'Спецтехника')
    src="/imgs/ForkliftTruck.png"
    @endif
    alt="...">
    <div class="card-body">
      <h5 class="card-title">Номер: {{ $transport->license_plate }}</h5>
      <h6 class="card-subtitle mb-2 text-muted">{{ $transport->kind->transport_kind }}</h6>
    </div>
  </div>
  @endforeach
</div>
<div class="d-flex justify-content-center">
  {{ $transports->links() }}
</div>
@endsection
