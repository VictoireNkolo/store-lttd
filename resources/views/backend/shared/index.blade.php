@extends('backend.layout.dashboard')

@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    {{ $dataTable->table(['class' => 'table table-bordered table-hover table-sm'], true) }}
    @if(Route::currentRouteName() === 'page.index')
        <a class="btn btn-primary" href="{{ route('page.create') }}" role="button">Créer une nouvelle page</a>
    @endif
@endsection

@section('js')
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  {{ $dataTable->scripts() }}
@endsection

