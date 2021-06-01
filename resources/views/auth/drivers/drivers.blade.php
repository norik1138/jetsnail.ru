@extends('auth.layouts.master')

@section('title', 'Водители')

@section('content')
<a class="btn btn-primary" role="button" href="{{ route('drivers.create') }}">Добавить водителя</a>

<table class="table table-sm mt-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Email</th>
      <th scope="col" class="d-flex justify-content-end">Действия</th>
    </tr>
  </thead>
  <tbody>
    @foreach($drivers as $driver)

    <tr>
      <th scope="row">{{ $driver->id }}</th>
      <td><a href="{{ route('drivers.show', $driver) }}">{{ $driver->name }}</a></td>
      <td><a href="{{ route('drivers.show', $driver) }}">{{ $driver->email }}</a></td>
      <td class="d-flex justify-content-end">
        <form class="" action="{{ route('drivers.destroy', $driver) }}" method="post">
          <a type="button" class="btn btn-warning" href="{{ route('drivers.edit', $driver) }}">Редактировать</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger" name="button">Удалить</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="d-flex justify-content-center">
{{ $drivers->links() }}
</div>
@endsection
