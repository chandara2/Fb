@extends('layout.layout_admin')
@section('title', 'ADMIN JOB')

@section('content')

    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Job</li>
                <li class="breadcrumb-item"><a href="
                    @if (auth()->user()!=null && $company_infos->isEmpty())
                    {{ route('admin.companyinfo.create') }}
                    @else
                    {{ route('admin.job.create') }}
                    @endif" class="text-decoration-none">New Job</a></li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        @if (session('userdelete'))
            <div class="alert alert-success">{{session('userdelete')}}</div>
        @endif
        
        <table class="customdatatable table table-hover table-bordered" style="width:100%">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Job Title</th>
                    <th>Location</th>
                    <th>Expired Post</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $i => $job)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$job->title}}</td>
                    <td>{{$job->location}}</td>
                    <td>
                        @if ($job->expired_post<now())
                            <span class="text-danger" title="Will be deleted the next day">{{$job->expired_post}}</span>
                        @else
                            {{$job->expired_post}}
                        @endif
                    </td>
                    <td>
                        {{-- @if ($job->approved == true)
                            Approved
                        @else
                            <span class="bg-primary bg-opacity-75 px-1 rounded text-white">Pending</span>
                        @endif --}}

                        <input type="checkbox" class="toggle-class" data-id="{{ $job->id }}" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $job->approved ? 'check':'' }}>
                        
                    </td>
                    <td>
                        <a href="/admin/job/{{ $job->id }}/edit" class="btn btn-sm btn-outline-primary" title="Edit"><i class="bi bi-pencil-square"></i></a>
                        <form action="/admin/job/{{ $job->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
                        </form>
                        <a href="#" class="btn btn-sm btn-outline-success" title="Detail"><i class="bi bi-eye"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Job Title</th>
                    <th>Location</th>
                    <th>Expired Post</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

    </div> <!-- end container-fluid -->


    <!-- Modal -->
{{-- <div class="modal fade" id="approved_pending_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enable status permissions</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="col-xl-6 col-md-8 mb-md-0 mb-sm-2">
                    <input type="radio" name="approved" value="1">
                    Approved
                    <input type="radio" name="approved" value="0" class="ms-3">
                    Pending
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Status</button>
        </div>
        </div>
    </div>
</div> --}}

@endsection

@section('script')
    <script>
        $(function(){
            $('.toggle-class').change(function(){
                var approved = $(this).prop('checked') == true ? 1:0
                var job_id = $(this).data('id')
                $.ajax({
                    type: "GET",
                    url: "/admin/changejobstatus",
                    data: {'approved':approved,'job_id',id},
                    dataType: "json",
                    success: function (data) {
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
@endsection