    @extends('layouts.adminlayout')
    @section('title')
        Articles
    @endsection
    @section('content')
         <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Articles</h2>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card card-body p-3">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped table-responsive">
                                    <tr>
                                        <th colspan="6" class="text-end">
                                            <a href="{{route('admin.article.create')}}">
                                                <button class="btn btn-success btn-sm">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>*</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Keywords</th>
                                        <th>Thumbnail</th>
                                        <th>#</th>
                                    </tr>
                                    @foreach ($articles as $key => $article)
                                        <tr>
                                            <td>{{$key+=1}}</td>
                                            <td>{{$article->category->name}}</td>
                                            <td>{{$article->title}}</td>
                                            <td>
                                                @foreach ($article->keywords as $keyword)
                                                    <span class="badge bg-light text-dark border">{{$keyword->name}}</span> ,
                                                @endforeach
                                            </td>
                                            <td><img src="{{asset($article->thumbnail)}}" width="50"></td>
                                            <td>
                                                <a href="{{route('admin.article.edit',$article->id)}}">
                                                    <button class="btn btn-sm btn-warning">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                </a>
                                                <a href="#"  onclick="deleteItem({{$article->id}})"> 
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </a>
                                                <form id="{{$article->id}}" action="{{route('admin.article.destroy',$article->id)}}" method="POST">
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