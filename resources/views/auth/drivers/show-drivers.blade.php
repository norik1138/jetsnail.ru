@extends('auth.layouts.master')

@section('title', "Водитель ".$driver->name)

@section('content')
  <a type="button" class="btn btn-secondary" href="{{ route('drivers.index') }}">Назад</a>


  <div class="card mt-3" style="width: 18rem;">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Id: {{ $driver->id }}</li>
      <li class="list-group-item">Имя: {{ $driver->name }}</li>
      <li class="list-group-item">Email: {{ $driver->email }}</li>
      @foreach($driver->transport()->get() as $transport)
      <li class="list-group-item">
        <form class="d-flex align-items-center justify-content-between" style="margin: 0;" action="{{ route('drivers.deleteRelation', [$driver->id, $transport->id]) }}" method="post">
          @csrf
          Транспорт: {{ $transport->license_plate}}
          <button type="submit" class="btn btn-primary" name="button">Открепить</button>
        </form>
      </li>
      @endforeach
      <li class="list-group-item">Дата добавления: {{ $driver->created_at->format('d/m/y H:i:s') }}</li>
      <li class="list-group-item">Дата обновления: {{ $driver->updated_at->format('d/m/y H:i:s') }}</li>
    </ul>
  </div>

  <form class="mt-3" action="{{ route('drivers.destroy', $driver) }}" method="post">
    <a type="button" class="btn btn-warning" href="{{ route('drivers.edit', $driver) }}">Редактировать</a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" name="button">Удалить</button>
  </form>
@endsection
