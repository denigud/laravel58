@extends('layouts.app')

@section('content')
    <categories-component last_page="{{ $paginator->lastPage() }}"></categories-component>

{{--    @if($paginator->total() > $paginator->count())--}}
{{--        <br>--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        {{ $paginator->links() }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}

@endsection


