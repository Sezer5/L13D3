
    <nav id="sidebar">
        <div class="p-4">
            <a class="text-decoration-none" href="{{route('admin.home')}}">
                <h4 class="text-white fw-bold"><i class="bi bi-cpu-fill me-2"></i>AdminPanel</h4>
            </a>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="{{route('admin.category.index')}}" class="nav-link active"><i class="bi bi-speedometer2 me-2"></i> Categories</a></li>
            <li class="nav-item"><a href="{{route('admin.keyword.index')}}" class="nav-link"><i class="bi bi-key me-2"></i> Keywords</a></li>
            <li class="nav-item"><a href="{{route('admin.article.index')}}" class="nav-link"><i class="bi bi-files me-2"></i> Articles</a></li>
            <li class="nav-item"><a href="{{route('admin.gallery.index')}}" class="nav-link"><i class="bi bi-images me-2"></i> Galleries</a></li>
            
        </ul>
    </nav>

