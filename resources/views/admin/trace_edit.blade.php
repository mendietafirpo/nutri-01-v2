@extends('layouts.guest')

@section('content')
<div class="container">
    <h2>Editar Registro</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('traces.update', $trace->traceId) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Device ID</label>
            <input type="text" name="devId" class="form-control" value="{{ old('devId', $trace->devId) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Longitude</label>
            <input type="text" name="devLong" class="form-control" value="{{ old('devLong', $trace->devLong) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Latitude</label>
            <input type="text" name="devLat" class="form-control" value="{{ old('devLat', $trace->devLat) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Serve Number</label>
            <input type="number" name="serveNum" class="form-control" value="{{ old('serveNum', $trace->serveNum) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Serve Time</label>
            <input type="datetime-local" name="serveTime" class="form-control" value="{{ old('serveTime', $trace->serveTime) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Voltage</label>
            <input type="text" name="serveVolt" class="form-control" value="{{ old('serveVolt', $trace->serveVolt) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Temperature</label>
            <input type="text" name="serveTemp" class="form-control" value="{{ old('serveTemp', $trace->serveTemp) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Humidity</label>
            <input type="text" name="serveHum" class="form-control" value="{{ old('serveHum', $trace->serveHum) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Pressure</label>
            <input type="text" name="servePress" class="form-control" value="{{ old('servePress', $trace->servePress) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Signal Quality</label>
            <input type="number" name="signalQual" class="form-control" value="{{ old('signalQual', $trace->signalQual) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Modem IMEI</label>
            <input type="text" name="modemImei" class="form-control" value="{{ old('modemImei', $trace->modemImei) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">SIM ICCID</label>
            <input type="text" name="simIccid" class="form-control" value="{{ old('simIccid', $trace->simIccid) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ url('/admin/admin_panel') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
