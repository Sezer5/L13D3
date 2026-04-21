    @extends('layouts.adminlayout')
    @section('title')
        Article Add
    @endsection
    @section('content')
         <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Article Add</h2>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card card-body p-3">
                            <div class="col-md-4">
                                <form action="{{route('admin.article.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Title</label>
                                        <input
                                            type="text"
                                            class="form-control @error('title') is-invalid @enderror"
                                            name="title"
                                            id="title"
                                            aria-describedby="helpId"
                                            placeholder="Enter a title*"
                                            value="{{old('title')}}"
                                        />
                                    </div>
                                    @error('title')
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{$message}}
                                            </strong>
                                        </span>
                                    @enderror
                                        <div class="mb-3">
                                        <label for="thumbnail" class="form-label">Thumbnail*</label>
                                        <input
                                            type="file"
                                            class="form-control @error('thumbnail') is-invalid @enderror"
                                            name="thumbnail"
                                            id="thumbnail"
                                        />
                                        @error('thumbnail')
                                            <span class="invalid-feedback">
                                                <strong>
                                                    {{$message}}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Category</label>
                                        <select
                                            class="form-select form-select-sm"
                                            name="category_id"
                                            id="category_id"
                                        >
                                            <option selected disabled>Select one</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('thumbnail')
                                            <span class="invalid-feedback">
                                                <strong>
                                                    {{$message}}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Keywords*</label>
                                        <select
                                            multiple
                                            class="form-select form-select-sm"
                                            name="keyword_id[]"
                                            id="keyword_id"
                                        >
                                            <option selected disabled>Select keywords please*</option>
                                            @foreach ($keywords as $keyword)
                                                <option value="{{$keyword->id}}" @if (collect(old('keyword_id'))->contains($keyword->id)) selected @endif>{{$keyword->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="desc" class="form-label ">Description*</label>
                                        <textarea class="form-control @error('desc') is-invalid @enderror summernote" name="desc" id="desc" rows="3">{{old('desc')}}</textarea>
                                        @error('desc')
                                            <span class="invalid-feedback">
                                                <strong>
                                                    {{$message}}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 text-end">
                                        <button
                                        type="submit"
                                        class="btn btn-primary"
                                        >
                                            Add
                                        </button>
                                    </div>
                                    
                                    
                                    
                                </form>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </main>
    @endsection