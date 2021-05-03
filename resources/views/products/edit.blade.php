@extends('main')

@section('title', 'edit')
    
@section('breadcrumb')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>products</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">edit</li>
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
            <div class="card-header">
                <div class="pull-left">
                    <strong>Edit Product</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url('products') }}" class="btn btn-secondary btn-sm"><i class="fa fa-undo"></i>&nbsp;Back</a>
                </div>
            </div>
            <div class="card-body">
                 <div class="row">
                     <div class="col-md-4 offset-md-4">
                         <form action="{{ url('products/'.$products->id) }}" method="POST">
                            @method('put')
                            @csrf
                             <div class="form-group">
                                 <label>Nama Product</label>
                                 <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $products->name) }}" autofocus>
                                 @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>                                     
                                 @enderror
                             </div>
                             <div class="form-group">
                                 <label>Description</label>
                                 <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $products->description) }}</textarea>
                                 @error('description')
                                 <div class="invalid-feedback">
                                    {{ $message }}
                                </div>  
                                 @enderror
                             </div>
                             <div class="form-group">
                                 <label>Price</label>
                                 <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $products->price) }}">
                                 @error('price')
                                    <div class="invalid-feedback">
                                    {{ $message }}    
                                    </div>                                     
                                 @enderror
                             </div>
                             <div class="form-group">
                                 <label>image url</label>
                                 <input type="text" class="form-control" name="image_url" value="{{ old('image_url', $products->image_url) }}">
                             </div>
                             <button type="submit" class="btn btn-success">Save</button>
                         </form>
                     </div>
                 </div>
            </div>
        </div>
    </div>
</div>
{{-- content --}}
@endsection