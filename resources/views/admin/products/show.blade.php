@extends('admin.layouts.master')
@section('title')
    Comments Blogs
@endsection
@section('css')
@endsection


@section('content')

    <div class="card basic-data-table">
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
                    setTimeout(function () {
                        document.getElementById('error-alert').style.display = 'none';
                    }, 20000);

                </script>
            @endif

            <div class="table-responsive">
                <table class="table bordered-table mb-0" id="dataTable" data-page-length="10">
                    <thead>
                    <tr>

                        <th scope="col">user name</th>
                        <th scope="col">status</th>
                        <th scope="col">rate</th>
                        <th scope="col">comments</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($row->commentable as $comment)
                        <tr>
                            <td>
                                {{ $comment->customer->name() ?? null }}
                            </td>
                            <td>
                                <div class="form-switch switch-success d-flex align-items-center gap-3">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           role="switch"
                                           id="flexSwitchCheckDefault{{$comment->id}}"
                                           {{$comment->status == 'active' ? 'checked' : ''}}
                                           onchange="toggleStatus({{$comment->id}}, this.checked ? 'active' : 'noActive0')">

                                    <label class="form-check-label line-height-1 fw-medium text-secondary-light"
                                           for="flexSwitchCheckDefault{{$comment->id}}">
                                        <span
                                            id="statusText{{$comment->id}}">{{$comment->status == 'active' ? 'active' : 'inActive'}}</span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                {{ $comment->value }}
                            </td>
                            <td>

                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$comment->id}}">
                                    <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                </button>

                                <div class="modal fade" id="exampleModal{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">comments</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $comment->comments }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </td>

                            <td>
                                <a href="{{route('admin_deletedComments',$comment->id)}}"
                                   class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                                    <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>

@endsection


@section('js')
    <script>
        function toggleStatus(id, currentStatus) {
            var newStatus = currentStatus === 'active' ? 'active' : 'noActive';
            $.ajax({
                url: "{{ route('admin_updateCommentsStatus') }}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                data: {
                    active: newStatus,
                    id: id
                },
                success: function (response) {
                    var statusText = document.getElementById('statusText' + id);
                    var checkbox = document.getElementById('flexSwitchCheckDefault' + id);

                    if (newStatus === 'active') {
                        statusText.textContent = 'active';
                        checkbox.checked = true;
                    } else {
                        statusText.textContent = 'inActive';
                        checkbox.checked = false;
                    }
                    alert('The status has been changed successfully');
                },
                error: function () {
                    alert('Something went wrong, please try again.');
                }
            });
        }


    </script>
@endsection
