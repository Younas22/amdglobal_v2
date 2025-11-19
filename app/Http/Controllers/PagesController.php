<?php

namespace App\Http\Controllers;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        // fetch home content from DB if needed
        return view('home');
    }


    public function staticPage($slug)
{
    $staticPages = [
        'contact' => [
            'view' => 'pages.contact',
            'seo' => [
                'title' => 'Contact Us',
                'description' => 'Get in touch with our support or sales team.',
                'keywords' => 'contact, support, help',
            ],
        ],
        'sitemap' => [
            'view' => 'pages.sitemap',
            'seo' => [
                'title' => 'Sitemap',
                'description' => 'Overview of all website links.',
                'keywords' => 'sitemap, navigation',
            ],
        ],
    ];

    if (array_key_exists($slug, $staticPages)) {
        $pageData = $staticPages[$slug];
        return view($pageData['view'], ['seo' => $pageData['seo']]);
    }

    if (in_array($slug, ['privacy-policy', 'terms-conditions','about'])) {
        $page = Page::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $seo = [
            'title' => $page->meta_title ?: $page->name,
            'description' => $page->meta_description ?: '',
            'keywords' => $page->meta_keywords ?: '',
        ];
        return view('pages.global', compact('page', 'seo'));
    }

    abort(404);
}




    public function index() {
        $blogs = BlogPost::with('category')
                        ->where('status', 'published')
                        ->latest()
                        ->paginate(10);
        
        // Get all active categories that have blog posts
        $categories = BlogCategory::has('posts')
                            ->whereHas('posts', function($query) {
                                $query->where('status', 'published');
                            })
                            ->get();
        
        return view('pages.blog', compact('blogs', 'categories'));
    }


    public function detail($slug) {
    $blog = BlogPost::with(['category', 'author', 'comments'])
                   ->where('slug', $slug)
                   ->where('status', 'published')
                   ->firstOrFail();

    // Increment view count
    $blog->increment('views_count');
    
    // Get related posts (from same category)
    $relatedPosts = BlogPost::where('category_id', $blog->category_id)
                           ->where('id', '!=', $blog->id)
                           ->where('status', 'published')
                           ->latest()
                           ->take(3)
                           ->get();
    
    // Get previous and next posts
    $previousPost = BlogPost::where('id', '<', $blog->id)
                          ->where('status', 'published')
                          ->orderBy('id', 'desc')
                          ->first();
    
    $nextPost = BlogPost::where('id', '>', $blog->id)
                      ->where('status', 'published')
                      ->orderBy('id', 'asc')
                      ->first();
    
    return view('pages.blogdetails', compact('blog', 'relatedPosts', 'previousPost', 'nextPost'));
}



}
