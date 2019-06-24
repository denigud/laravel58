@php
    /** @var \App\Models\ShopItem $item */
@endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_active)
                    Активный
                @else
                    Не активный
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Доп. данные</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input name="title" value="{{ $item->title }}"
                                   id="title"
                                   type="text"
                                   class="form-control"
                                   minlength="3"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input name="price" value="{{ $item->price }}"
                                   id="price"
                                   type="number"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Описание товара</label>
                            <textarea name="description"
                                      id="description"
                                      rows="20"
                                      class="form-control">{{ old('description', trim($item->description)) }}
                            </textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control"
                                    placeholder="Выберете катигорию"
                                    required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                            @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{ $categoryOption->id_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input name="slug" value="{{ $item->slug }}"
                                      id="slug"
                                      type="text"
                                      class="form-control">
                        </div>

                        <div class="form-check">
                            <input name="is_active"
                                   type="hidden"
                                   value="0">

                            <input name="is_active"
                                   type="checkbox"
                                   class="form-check-input"
                                    value="1"
                                    @if($item->is_active)
                                        checked = "checked"
                                    @endif
                            >
                            <label class="form-check-label" for="is_active">Активный</label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


