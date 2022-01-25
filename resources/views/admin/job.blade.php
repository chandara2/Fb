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
                        @if ($job->approved == true)
                            Approved
                        @else
                            <span class="bg-primary bg-opacity-75 px-1 rounded text-white">Pending</span>
                        @endif
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

    </div>

    <!-- Modal -->
    <div class="modal fade" id="approved_post_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enable Status Permissions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form action="">
                    <select id="esp_esp_esp" class="form-select">
                        <option value="0">Pending</option>
                        <option value="1">Approved</option>
                    </select>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update-approved-job-btn">Update</button>
            </div>
            </div>
        </div>
    </div>
    
@endsection