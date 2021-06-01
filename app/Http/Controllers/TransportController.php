<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transport;
use App\Models\TransportKind;

class TransportController extends Controller
{
    public function getTransports() {
      $transports = Transport::all();
      foreach ($transports as $transport) {
        $transport->kind->transport_kind;
      }
      return $transports;
    }

    public function get_transport($id) {
      $transport = Transport::find($id);
      return response()->json($transport);
    }

    public function getTransportKinds() {
      $transportKinds = TransportKind::all();
      return $transportKinds;
    }

    public function save_transport(Request $request) {
      $transport = new Transport;
      $transport->license_plate = $request->license_plate;
      $transport->status = $request->status;
      $transport->kind_id = $request->kind_id;

      if ($request->driver_id == 'undefined') {
        $transport->driver_id = null;
      } else {
        $transport->driver_id = $request->driver_id;
      }

      if ($transport->save()) {
        return response()->json(['status' => true, 'message' => 'Транспорт успешно добавлен']);
      } else {
        return response()->json(['status' => false, 'message' => 'Возникли проблемы, пожалуйста попробуйте еще раз']);
      }

    }

    public function update_transport(Request $request, $id) {
      $transport = Transport::find($id);
      $transport->license_plate = $request->license_plate;
      $transport->status = $request->status;
      $transport->kind_id = $request->kind_id;

      if ($request->driver_id == 'undefined') {
        $transport->driver_id = null;
      } else {
        $transport->driver_id = $request->driver_id;
      }

      if ($transport->save()) {
        return response()->json(['status' => true, 'message' => 'Транспорт успешно обновлен']);
      } else {
        return response()->json(['status' => false, 'message' => 'Возникли проблемы, пожалуйста попробуйте еще раз']);
      }

    }

    public function deleteTransport($id) {
      $transport = Transport::find($id);
      if ($transport->delete()) {
        return response()->json(['status' => true, 'message' => 'Транспорт успешно удален']);
      } else {
        return response()->json(['status' => false, 'message' => 'Возникли проблемы, пожалуйста попробуйте еще раз']);
      }
    }
}
