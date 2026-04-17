@extends('layouts.adminlayout')
    @section('title')
        Edit Keywords
    @endsection
    @section('content')
         <main class="p-4">
            <div class="container-fluid">
                <h2 class="mb-4 fw-bold" style="color: var(--dark-color);">Kontrol Paneli</h2>
                <div class="row">
                    <div class="card card-body">
                        <form action="{{route('admin.keywords.update',$keyword->slug)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    id="name"
                                    aria-describedby="helpId"
                                    value="{{$keyword->name,old('name')}}"
                                    required
                                />
                                    @error('name')
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{$message}}
                                            </strong>
                                        </span>
                                    @enderror
                                <button type="submit" class="btn btn-success mt-3">Update</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </main>
    @endsection