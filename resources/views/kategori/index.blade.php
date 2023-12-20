@extends('layouts.app')

@section('title', 'Data Kategori')

@section('contents')
    <!-- Page Heading and Add Product Button -->
    <div class="d-flex justify-content-between align-items-center">
    <hr>
        <h1 class="h3 mb-2 text-gray-800"></h1>
        <div>
            <a href="{{ route('kategori.create') }}" class="btn btn-primary mb-3">Add Product</a>
        </div>
    </div>
    

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($kategori->count() > 0)
                                @foreach($kategori as $rs)
                                    <tr>
                                        <td>{{ $rs->id }}</td>
                                        <td>{{ $rs->jenis }}</td>
                                        <td>
<div class="btn-group justify-content-end" role="group" aria-label="Basic example">
    <a href="{{ route('kategori.show', $rs->id) }}" class="btn btn-info">Detail</a>
    <a href="{{ route('kategori.edit', $rs->id)}}" class="btn btn-warning">Edit</a>
    <form action="{{ route('kategori.destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Delete?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">Category not found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
