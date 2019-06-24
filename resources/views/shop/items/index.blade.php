@extends('layouts.app')

@section('content')
<div class="card-deck">
    @foreach($paginator as $item)
        @php /** @var \App\Models\ShopItem $item */ @endphp
        <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ route('shop.items.show', $item->id) }}">
                        {{ $item->title }}
                    </a>
                </h5>
                <p class="card-text">
                    {{ $item->description }}
                </p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Цена: {{ $item->price }}</small>
            </div>
        </div>
    @endforeach
</div>
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
{{--<table>--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>#</th>--}}
{{--        <th>Заголовок</th>--}}
{{--        <th>Цена</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    @foreach($items as $item)--}}
{{--        @php /** @var \App\Models\ShopItem $item */ @endphp--}}
{{--        <tr>--}}
{{--            <td>{{ $item->id }}</td>--}}
{{--            <td>--}}
{{--                <a href="{{ route('shop.items.show', $item->id) }}">--}}
{{--                    {{ $item->title }}--}}
{{--                </a>--}}
{{--            </td>--}}
{{--            <td>{{ $item->price }}</td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--</table>--}}
@endsection
