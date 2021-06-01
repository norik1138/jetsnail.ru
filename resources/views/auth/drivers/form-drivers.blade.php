@extends('auth.layouts.master')

@section('title', @isset($driver) ? 'Редактировать '.$driver->name : 'Добавление водителя')

@section('content')
<a type="button" class="btn btn-secondary" href="{{ route('drivers.index') }}">Назад</a>

<form class="mt-3"
      @if( isset($driver) )
      action="{{ route('drivers.update', $driver) }}"
      @else
      action="{{ route('drivers.store') }}"
      @endif
      method="post">
  @csrf
  @isset($driver)
    @method('PUT')
  @endisset
  <div class="row">
    <div class="col">
      <input name="name"
             value="{{ old('name', isset($driver) ? $driver->name : null) }}"
             type="text" class="form-control" placeholder="Имя" aria-label="name">
      @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="row mt-3">
    <div class="col">
      <input name="email"
             value="{{ old('email', isset($driver) ? $driver->email : null) }}"
             type="text" class="form-control" placeholder="Email" aria-label="email">
       @error('email')
         <div class="alert alert-danger">{{ $message }}</div>
       @enderror
    </div>
  </div>
  <div class="row mt-4">
    <div class="col">
      <button type="submit" class="btn btn-success">Добавить</button>
    </div>
  </div>

</form>
@endsection
