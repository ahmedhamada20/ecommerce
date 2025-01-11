@extends('admin.layouts.master')
@section('title')
    products
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
        background-color: #dc3545; /* Default for Unpublished */
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
        background-color: #28a745; /* For Published */
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
            <a href="{{route('admin_products.create')}}" type="button" class="btn btn-primary">
                Add new
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
                    <th scope="col">Images</th>
                        <th scope="col">name</th>
                        <th scope="col">slug</th>
                        <th scope="col">Description</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Category</th>
                        <th scope="col">Brand</th>
                        <th scope="col">status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                        <td>
                               <img src="https://laravel.wowdash.wowtheme7.com/assets/images/user.png" alt="" srcset="">
                            </td>
                            <td>
                                {{ $row->name() }}
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="text-primary-600">{{ $row->slug }}</a>
                            </td>
                            <td>
                                    <p> Description</p>
                            </td>
                            <td>
                                    <p> SKU</p>
                            </td>
                            <td>
                                    <p> Ctegory</p>
                            </td>
                            <td>
                                    <p> Brand</p>
                            </td>
                            <td>
    <div class="d-flex align-items-center">
        <label class="custom-toggle">
            <input type="checkbox" id="publishToggle{{ $row->id }}" 
                   {{ $row->is_published ? 'checked' : '' }} 
                   onchange="togglePublish({{ $row->id }}, this.checked)">
            <span class="custom-toggle-slider"></span>
        </label>
        <span id="publishLabel{{ $row->id }}" 
              class="status-text {{ $row->is_published ? 'published' : 'unpublished' }}">
            {{ $row->is_published ? 'Published' : 'Unpublished' }}
        </span>
    </div>
</td>


                            <td>
                                <!-- <a href="{{route('admin_blogs.show',$row->id)}}"
                                   class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </a> -->
                                <a href="{{route('admin_products.edit',$row->id)}}"

                                   class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="lucide:edit"></iconify-icon>
                                </a>
                                <a href="javascript:void(0)"
                                   data-bs-toggle="modal" data-bs-target="#deleted{{$row->id}}"
                                   class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                {{$data->links()}}
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
