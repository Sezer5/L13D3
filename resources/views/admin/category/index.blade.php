    @extends('layouts.adminlayout')
    @section('title')
        Categories
    @endsection
    @section('content')
         <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Categories</h2>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card card-body p-3">
                            <div class="col-md-4">
                                <table class="table table-bordered table-striped table-responsive">
                                    <tr>
                                        <th colspan="5" class="text-end">
                                            <a href="{{route('admin.category.create')}}">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>*</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>#</th>
                                    </tr>
                                    @foreach ($categories as $key => $category)
                                        <tr>
                                            <td>{{$key+=1}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>
                                                <a href="{{route('admin.category.edit',$category->slug)}}">
                                                    <button class="btn btn-sm btn-warning">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                </a>
                                                <a href="#"  onclick="deleteItem({{$category->id}})"> 
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </a>
                                                <form id="{{$category->id}}" action="{{route('admin.category.destroy',$category->slug)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
    @endsection