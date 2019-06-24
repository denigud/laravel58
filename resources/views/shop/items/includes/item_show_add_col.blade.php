@php
    /** @var \App\Models\ShopItem $item */
@endphp
@if($item->exists)
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>ID: {{ $item->id }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Цена</label>
                        <input type="text" value="{{ $item->price }}" class="form-control" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endif
