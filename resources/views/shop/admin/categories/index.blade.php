@extends('layouts.app')

@section('content')
    <categories-component last_page="{{ $paginator->lastPage() }}"></categories-component>
@endsection


