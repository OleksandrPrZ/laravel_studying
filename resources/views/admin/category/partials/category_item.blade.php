<li class="dd-item" data-id="{{ $category->id }}">
    <div class="dd-handle">{{ $category->name }}</div>
    <div class="category-actions">
        <button class="edit-category"
                data-id="{{ $category->id }}"
                data-edit-url="{{ route('admin.category.edit', $category->id) }}">
            Edit
        </button>
        <button class="delete-category"
                data-id="{{ $category->id }}"
                data-delete-url="{{ route('admin.category.delete', $category->id) }}">
            Delete
        </button>
    </div>

    @if ($category->children->isNotEmpty())
        <ol class="dd-list">
            @foreach ($category->children as $child)
                @include('admin.category.partials.category_item', ['category' => $child])
            @endforeach
        </ol>
    @endif
</li>
