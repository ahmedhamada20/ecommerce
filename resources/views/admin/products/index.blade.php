@extends('admin.layouts.master')

@section('title')
    Products
@endsection

@section('css')
<style>
    .custom-toggle {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 25px;
    }

    .custom-toggle input {
        display: none;
    }

    .custom-toggle-slider {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #dc3545;
        border-radius: 25px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .custom-toggle-slider:before {
        content: '';
        position: absolute;
        height: 20px;
        width: 20px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        border-radius: 50%;
        transition: transform 0.3s ease-in-out;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .custom-toggle input:checked + .custom-toggle-slider {
        background-color: #28a745;
    }

    .custom-toggle input:checked + .custom-toggle-slider:before {
        transform: translateX(25px);
    }

    .status-text {
        margin-left: 10px;
        font-size: 0.85rem;
        font-weight: bold;
        text-transform: capitalize;
        color: #6c757d;
    }

    .status-text.published {
        color: #28a745;
    }

    .status-text.unpublished {
        color: #dc3545;
    }
</style>
@endsection

@section('content')

<div class="card basic-data-table">
    <div class="card-header d-flex align-items-center justify-content-between flex-wrap">
        <a href="{{ route('admin_products.create') }}" class="btn btn-primary">
            Add New Product
        </a>
    </div>
    
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger" id="error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('error-alert').style.display = 'none';
                }, 20000);
            </script>
        @endif

        <div class="table-responsive">
            <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Category</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/products/' . ($product->images->first()->filename ?? 'default.png')) }}" width="50">
                            </td>
                            <td>{{ $product->localized_name }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ Str::limit($product->short_description_en, 30) }}</td>
                            <td>{{ $product->SKU }}</td>
                            <td>{{ $product->categories->pluck('name')->join(', ') }}</td>
                            <td>{{ $product->brand->name ?? '-' }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <label class="custom-toggle">
                                        <input type="checkbox" id="publishToggle{{ $product->id }}" 
                                               {{ $product->is_published ? 'checked' : '' }} 
                                               onchange="togglePublish({{ $product->id }}, this.checked)">
                                        <span class="custom-toggle-slider"></span>
                                    </label>
                                    <span id="publishLabel{{ $product->id }}" 
                                          class="status-text {{ $product->is_published ? 'published' : 'unpublished' }}">
                                        {{ $product->is_published ? 'Published' : 'Unpublished' }}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin_products.edit', $product->id) }}" 
                                   class="btn btn-sm btn-success">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin_products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    function togglePublish(id, isChecked) {
        const newStatus = isChecked ? 1 : 0;

        $.ajax({
            url: '/admin/update-publish-status',
            method: 'POST',
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            data: {
                id: id,
                is_published: newStatus
            },
            success: function (response) {
                const label = document.getElementById(`publishLabel${id}`);
                label.textContent = newStatus ? 'Published' : 'Unpublished';
                label.classList.toggle('published', newStatus);
                label.classList.toggle('unpublished', !newStatus);
                alert(response.message);
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Failed to update the publish status. Please try again.');
            }
        });
    }
</script>
@endsection
