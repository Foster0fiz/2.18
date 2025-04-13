<div class="card mb-4">
    <div class="card-header">
        <h5>Добавить комментарий</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="commentable_id" value="{{ $model->id }}">
            <input type="hidden" name="commentable_type" value="{{ get_class($model) }}">

            <div class="mb-3">
                <label for="user_name" class="form-label">Ваше имя</label>
                <input type="text" name="user_name" id="user_name"
                       class="form-control @error('user_name') is-invalid @enderror"
                       value="{{ old('user_name') }}" required>
                @error('user_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Комментарий</label>
                <textarea name="content" id="content" rows="3"
                          class="form-control @error('content') is-invalid @enderror"
                          required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</div>