@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pasien</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-success" href="{{ route('patient.create') }}">tambah</a>
                    <table class="table table-sm">
                        <tr>
                            <th>No RM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($patients as $patient)
                        <tr>
                            <td>{{ $patient->no_rm }}</td>
                            <td>{{ $patient->nama }}</td>
                            <td>{{ $patient->alamat }}</td>
                            <td>
                                <form method="patient" action="{{ route('patient.destroy', $patient->id) }}" onsubmit="return confirm('Apakah anda yakin?');">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('patient.show', $patient->id) }}">show</a>
                                    <a href="{{ route('patient.edit', $patient->id) }}">edit</a>
                                    <button type="submit">delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
