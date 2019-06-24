@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\ShopItem $item */ @endphp

    <div class="container">

        <form method="GET" action="">

        @csrf
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @include('shop.items.includes.item_show_main_col')
                </div>
                <div class="col-md-3">
                    @include('shop.items.includes.item_show_add_col')
                </div>
            </div>
        </form>

    </div>

@endsection
