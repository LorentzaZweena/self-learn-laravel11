<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <article class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-8 sm:px-8">
          <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4 leading-tight">
            {{ $post['title'] }}
          </h1>
          
          <div class="flex flex-wrap items-center text-sm text-gray-600 mb-6 gap-2">
            <span>By</span>
            <a href="/posts?author={{ $post->author->username }}" 
               class="font-medium text-blue-600 hover:text-blue-800 hover:underline transition-colors">
              {{ $post->author->name }}
            </a>
            <span class="text-gray-400">•</span>
            <span>in</span>
            <a href="/posts?category={{ $post->category->slug }}" 
               class="font-medium text-blue-600 hover:text-blue-800 hover:underline transition-colors">
              {{ $post->category->name }}
            </a>
            <span class="text-gray-400">•</span>
            <time class="text-gray-500">{{ $post->created_at->diffForHumans() }}</time>
          </div>

          <div class="border-t border-gray-200 mb-6"></div>
          <div class="prose prose-lg max-w-none">
            <p class="text-gray-700 leading-relaxed text-lg">
              {{ $post['body'] }}
            </p>
          </div>
        </div>

        <div class="px-6 py-4 sm:px-8 bg-gray-50 border-t border-gray-200">
          <a href="/posts" 
             class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition-colors group">
            <svg class="w-4 h-4 mr-2 transition-transform group-hover:-translate-x-1" 
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Posts
          </a>
        </div>
        
      </article>
    </div>
  </div>

</x-layout>
