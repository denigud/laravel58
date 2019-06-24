@extends('layouts.app')

@section('content')
    @php /** @var \App\Models\ShopItem $item */ @endphp

    <div class="container">


        @include('shop.admin.items.includes.result_messages')

        @if($item->exists)
            <form method="POST" action="{{ route('shop.admin.items.update', $item->id) }}">
                @method('PATCH')
        @else
            <form method="POST" action="{{ route('shop.admin.items.store') }}">
        @endif

            @csrf
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('shop.admin.items.includes.item_edit_main_col')
                    </div>
                    <div class="col-md-3">
                        @include('shop.admin.items.includes.item_edit_add_col')
                    </div>
                </div>
            </form>

            @if($item->exists)
                <br>
                <form method="POST" action="{{ route('shop.admin.items.destroy', $item->id) }}">
                    @method('DELETE')
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                           <div class="card card-block">
                               <div class="card-body ml-auto">
                                   <button type="submit" class="btn btn-link">Удалить</button>
                               </div>
                           </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </form>
            @endif

    </div>

@endsection
