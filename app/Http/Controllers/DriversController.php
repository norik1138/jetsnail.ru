<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Transport;
use Illuminate\Http\Request;
use App\Http\Requests\DriverRequest;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
      $drivers = Driver::paginate();
      return view('auth.drivers.drivers', compact('drivers'));
    }

    public function deleteRelation($driverId, $transportId)
    {
      $transport = Transport::where('id', $transportId)->where('driver_id', $driverId)->first();
      $transport->driver_id = null;
      if ( $transport->save() ) {
        session()->flash('success', 'Транспорт откреплен');
      } else {
        session()->flash('warning', 'Случилась ошибка');
      }
      return redirect()->route('drivers.show', [$driverId]);
      // $driver->update( $request->only(['name','email']) );
      // return redirect()->route('drivers.index')->withSuccess('Водитель '.$driver->name.' изменен');
    }

    public function getDrivers()
    {
      $drivers = Driver::all();
      return $drivers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
      return view('auth.drivers.form-drivers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DriverRequest $request)
    {
      Driver::create( $request->only(['name', 'email']) );
      return redirect()->route('drivers.index')->withSuccess('Водитель '.$request->name.' добавлен');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
      return view('auth.drivers.show-drivers', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
      return view('auth.drivers.form-drivers', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DriverRequest $request, Driver $driver)
    {
      $driver->update( $request->only(['name','email']) );
      return redirect()->route('drivers.index')->withSuccess('Водитель '.$driver->name.' изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Driver $driver)
    {
      $driver->transport()->update(['driver_id' => null]);
      $driver->delete();
      return redirect()->route('drivers.index')->withDanger('Водитель '.$driver->name.' удален');
    }

}
