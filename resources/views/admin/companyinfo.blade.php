@extends('layout.layout_admin')
@section('title', 'ADMIN INFO')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Company Information</h1>
        </div>
    </div>

    <div class="container-fluid">
        @if (session('userdelete'))
            <div class="alert alert-success">{{session('userdelete')}}</div>
        @endif
        
        <table class="customdatatable table table-hover table-bordered" style="width:100%">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Tb ID</th>
                    <th>Tb UID</th>
                    <th>Company</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companyinfos as $i => $companyinfo)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$companyinfo->id}}</td>
                    <td>{{$companyinfo->uid}}</td>
                    <td>{{$companyinfo->company}}</td>
                    <td>
                        <img src="{{asset('upload/companylogo/')}}/{{$companyinfo->logo}}" alt="logo here" class="me-3" style="width: 50px; height: 50px; object-fit: contain;">    
                    </td>
                    <td>
                        <a href="/admin/companyinfo/{{ $companyinfo->id }}/edit"><i class="bi bi-pencil-square btn text-muted pe-0" style="font-size:24px;"></i></a>    
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Tb ID</th>
                    <th>Tb UID</th>
                    <th>Company</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

    </div>

@endsection