<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  {{-- buat search --}}
  <div class="mx-auto max-w-7xl px-6">
    <div class="mx-auto max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none">
      <div class="mx-auto max-w-xl lg:max-w-lg flex justify-center">
        <form action="" method="get" class="w-full">
          {{-- ini untuk pencarian yang dari category --}}
          @if(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
          @endif

          {{-- ini untuk pencarian yang dari author --}}
          @if(request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
        <div class="mt-6 flex max-w-md gap-x-4 bg-white mx-auto">
          <label for="search" class="sr-only">Search</label>
          <input id="search" name="search" type="search" class="min-w-0 flex-auto rounded-md bg-white/5 px-3.5 py-2 text-base outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" placeholder="🔍 &nbsp;Search article">
          <button type="submit" class="flex-none rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Search</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  {{-- $posts = dari route
  $blog = variable yang aku buat sendiri --}}

  {{ $posts->links() }}
  {{-- pagination --}}

  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-0 lg:mx-0 lg:max-w-none md:grid-cols-2 lg:grid-cols-3">
    @forelse ($posts as $blog)
      <article class="flex max-w-xl flex-col items-start justify-between bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
        <div class="p-6 flex flex-col h-full">
          <div class="flex items-center gap-x-4 text-xs mb-4">
            <time datetime="2020-03-16" class="text-gray-500">{{ $blog->created_at->diffForHumans() }}</time>

            {{-- gunanya ? di href : untuk mengeksekusi fungsi --}}
            <a href="/posts?category={{ $blog->category->slug }}" class="relative z-10 rounded-full bg-{{ $blog->category->color }}-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-{{ $blog->category->color }}-100 transition-colors">{{ $blog->category->name }}</a>
          </div>
          
          <div class="group relative flex-grow">
            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600 transition-colors">
              <a href="/posts/{{ $blog['slug'] }}" class="hover:underline">
                {{-- absolute inset-0 : untuk membuat link cover seluruh area --}}
                <span class="absolute inset-0"></span>
                {{ $blog->title }}
              </a>
            </h3>
            <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{ Str::limit($blog->body, 100) }}</p>
          </div>
          
          <div class="relative mt-8 flex items-center gap-x-4 pt-4 border-t border-gray-100">
            <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-10 rounded-full bg-gray-50">
            <div class="text-sm/6">
              <p class="font-semibold text-gray-900">
                <a href="/posts?author={{ $blog->author->username }}" class="hover:text-gray-600 transition-colors">
                  <span class="absolute inset-0"></span>
                  {{ $blog->author->name }}
                </a>
              </p>
              {{-- <p class="text-gray-600">Co-Founder / CTO</p> --}}
            </div>
          </div>
        </div>
      </article>
      {{-- jika tidak ditemukanz, maka tampilin ini --}}
      @empty
      <div>
        <p class="font-semibold text-xl my-4">Article not found!</p>
        <a href="/posts" class="block text-blue-600 hover:underline">&laquo; Back to all posts</a>
      </div>
  @endforelse
      </div>
  </div>
</x-layout>
