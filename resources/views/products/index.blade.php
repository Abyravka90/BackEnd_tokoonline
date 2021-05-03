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
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="animated fadeIn">
        <div class="card">
            <div class="card-body">
            <div class="pull-right mb-3">
                <a href="{{ url('products/create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>&nbsp;add</a>
            </div>
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>    
                <tbody>
                    @if ($products->count() > 0)
                    @foreach ($products as $key => $item)    
                    <tr>
                        <td>{{ $products->firstItem()+$key }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->price }}</td>
                        <td><a href="{{ url('products/'.$item->id.'/edit') }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="text-center">Data Kosong</td>
                    </tr>
                    @endif
                </tbody>
                </table>  
                
                <div class="pull-right">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection