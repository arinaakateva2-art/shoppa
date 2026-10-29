@csrf

@if(!empty($product) && $product->exists)
    @method('PUT')
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3">
    <label for="title" class="form-label">Наименование</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $product->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="content" class="form-label">Описание</label>
    <textarea name="content" id="content" class="form-control" rows="4" required>{{ old('content', $product->content ?? '') }}</textarea>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label for="price" class="form-label">Цена</label>
        <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" min="1" required>
    </div>
    <div class="col-md-4">
        <label for="old_price" class="form-label">Старая цена</label>
        <input type="number" step="0.01" name="old_price" id="old_price" class="form-control" value="{{ old('old_price', $product->old_price ?? '') }}">
    </div>
    <div class="col-md-4">
        <label for="qty" class="form-label">Количество</label>
        <input type="number" name="qty" id="qty" class="form-control" value="{{ old('qty', $product->qty ?? '') }}" min="1" required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="category_id" class="form-label">Категория</label>
        <select name="category_id" id="category_id" class="form-select" required>
            <option value="">Выберите категорию</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                    {{ $category->title }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label for="status_id" class="form-label">Статус</label>
        <select name="status_id" id="status_id" class="form-select" required>
            <option value="">Выберите статус</option>
            @foreach($statuses as $status)
                <option value="{{ $status->id }}" {{ (old('status_id', $product->status_id ?? '') == $status->id) ? 'selected' : '' }}>
                    {{ $status->title }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-3">
    <label for="img" class="form-label">Картинка</label>
    <input type="file" name="img" id="img" class="form-control" {{ empty($product) ? 'required' : '' }}>
    @if(!empty($product) && $product->img)
        <div class="mt-2">
            <img src="{{ $product->getImage() }}" alt="" width="100" class="img-thumbnail">
        </div>
    @endif
</div>

<div class="form-check mb-2">
    <input type="checkbox" name="hit" id="hit" class="form-check-input" value="1" {{ old('hit', $product->hit ?? false) ? 'checked' : '' }}>
    <label for="hit" class="form-check-label">Хит</label>
</div>

<div class="form-check mb-4">
    <input type="checkbox" name="sale" id="sale" class="form-check-input" value="1" {{ old('sale', $product->sale ?? false) ? 'checked' : '' }}>
    <label for="sale" class="form-check-label">Скидка</label>
</div>

<button type="submit" class="btn btn-primary">Сохранить</button>