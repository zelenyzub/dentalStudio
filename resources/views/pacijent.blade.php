@extends('layouts.app')
@section('content')
<patient-component :patient-id="{{ $id }}"></patient-component>
@endsection

