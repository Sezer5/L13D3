@extends('layouts.adminlayout')
    @section('title')
        Home
    @endsection
    @section('content')
         <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Kontrol Paneli</h2>
                <div class="row">
                    <div class="card card-body">
                        <div class="col-md-6">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td colspan="5" class="text-end">
                                            <a href="{{route('admin.category.create')}}">
                                                <button class="btn btn-success">
                                                    <i class="bi bi-plus"></i> Add Category
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>*</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>
                                                <a href="{{route('admin.category.edit',$category->slug)}}">
                                                    <button class="btn btn-warning"><i class="bi bi-pencil"></i></button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" onclick="deleteItem({{$category->id}})" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                                <form id="{{$category->id}}" action="{{route('admin.category.destroy',$category->slug)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection