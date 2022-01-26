@extends('layout.layout_admin')
@section('title', 'ADMIN JOB')

@section('content')

    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Jobs</h1>
        </div>
    </div>

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
        
        <table id="update_status_switch" class="customdatatable table table-hover table-bordered" style="width:100%">
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
                        <input data-id="{{ $job->id }}" class="toggle-class" type="checkbox"  data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Approved" data-off="Pending" {{ $job->approved ? 'checked':'' }}>
                    </td>
                    <td>
                        <a href="/admin/job/{{ $job->id }}/edit" title="Edit"><i class="bi bi-pencil-square text-primary"></i></a>
                        <form action="/admin/job/{{ $job->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                        </form>
                        <a href="#" title="Detail"><i class="bi bi-eye text-success"></i></a>
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

@endsection

@section('script')
    <script>
        $(document).ready(function (){
            $('#update_status_switch').DataTable()
        });

        $(function(){
            $('.toggle-class').change(function(){
                var approved = $(this).prop('checked') == true ? 1:0;
                var job_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "/admin/changejobstatus",
                    data: {'approved':approved,'id':job_id},
                    dataType: "json",
                    success: function (data) {
                        console.log(data.success)
                    }
                });
            });
        });
    </script>
@endsection