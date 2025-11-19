@extends('common.layout')
@section('content')
    <div class="flight-container">
        <!-- Hero Section -->
        <div class="page-header">
            <h1>Travel Blog</h1>
            <p class="mb-2">Discover amazing travel stories, tips, and destinations from our community</p>
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Search articles...">
                <button class="search-btn">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
        </div>


<section class="blog-grid mt-4">
    @foreach($blogs as $blog)
        <div class="blog-card" onclick="openBlogDetail('{{ $blog->slug }}')">

            <!-- Blog Image -->
            <div class="blog-image">
                @if($blog->featured_image)
                    <img src="{{ url('storage/app/public/'.$blog->featured_image) }}" alt="{{ $blog->title }}">
                @else
                    <div class="blog-image-placeholder">
                        <i class="fas fa-image"></i>
                    </div>
                @endif

                <div class="blog-category">
                    {{ $blog->category->name }}
                </div>
            </div>

            <!-- Blog Content -->
            <div class="blog-content">
                <div class="blog-date">
                    <i class="fas fa-calendar"></i>
                    {{ $blog->created_at->format('d M Y') }}
                </div>

                <div class="blog-title">{{ $blog->title }}</div>

                <div class="blog-excerpt">
                    {{ Str::limit($blog->excerpt, 120) }}
                </div>
            </div>

            <!-- Blog Footer -->
            <div class="blog-footer">
                <div class="blog-author">
                    <div class="author-avatar">
                        {{ strtoupper(substr($blog->author_name ?? 'AU', 0, 2)) }}
                    </div>
                    <div class="author-name">{{ $blog->author_name ?? 'Admin' }}</div>
                </div>

                <div class="read-time">
                    <i class="fas fa-clock"></i>
                    {{ $blog->reading_time }} min read
                </div>
            </div>

        </div>
    @endforeach
</section>


<!-- Pagination -->
<div class="blog-pagination mt-4">
    {{ $blogs->links() }}
</div>
    </div>


    <script>
    function openBlogDetail(slug) {
        window.location.href = "{{ route('blog.detail', ':slug') }}".replace(':slug', slug);
    }
</script>

@endsection