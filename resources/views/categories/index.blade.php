@extends('layouts.app')

@section('content')
<div class="categories-section">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Categories</h2>
        <button id="addCategoryBtn" type="button" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">
            + Add Category
        </button>
    </div>

    <div id="categoriesGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($categories as $category)
            @include('categories.partials.category-card')
        @endforeach
    </div>

    @include('categories.modals.form-modal')
    @include('categories.modals.delete-modal')
</div>
@endsection
