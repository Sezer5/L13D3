    @extends('layouts.adminlayout')
    @section('title')
        Category Add
    @endsection
    @section('content')
         <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Category Add</h2>

                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card card-body p-3">
                            <div class="col-md-4">
                                <form action="{{route('admin.category.store')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input
                                            type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            name="name"
                                            id="name"
                                            aria-describedby="helpId"
                                            placeholder="Enter a name*"
                                            value="{{old('name')}}"
                                        />
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