@extends('layouts.app')

@section('content')

    <categories-component current_page="{{ $paginator->currentPage() }}"></categories-component>

    @if($paginator->total() > $paginator->count())
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{ $paginator->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection


