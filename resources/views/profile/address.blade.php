@extends('layouts.app')


@section('content')

    @include('layouts.partials.sidebarprofile')

    @livewire('address-form')
@endsection