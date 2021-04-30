@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-dashboard"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')


<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                </thead>    
                <tbody>
                    @foreach ($products as $key => $item)    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>  
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection