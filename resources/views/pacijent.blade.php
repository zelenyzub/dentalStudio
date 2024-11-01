@extends('layouts.app')
@section('content')
    <div v-if="loading"
        class="page-loader flex-column bg-dark bg-opacity-25 position-fixed top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center"
        style="z-index: 9999;">
        <span class="spinner-border text-primary" role="status"></span>
        <span class="text-gray-800 fs-6 fw-semibold mt-5">Molimo sačekajte...</span>
    </div>

    <patient-component :patient-id="{{ $id }}" @loading="loading = true"
        @loaded="loading = false"></patient-component>
@endsection
