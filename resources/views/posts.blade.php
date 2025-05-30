<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  {{-- $posts = dari route
  $blog = variable yang aku buat sendiri --}}

  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-0 lg:mx-0 lg:max-w-none md:grid-cols-2 lg:grid-cols-3">
  @foreach ($posts as $blog)
      <article class="flex max-w-xl flex-col items-start justify-between bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
        <div class="p-6 flex flex-col h-full">
          <div class="flex items-center gap-x-4 text-xs mb-4">
            <time datetime="2020-03-16" class="text-gray-500">{{ $blog->created_at->diffForHumans() }}</time>
            <a href="/categories/{{ $blog->category->slug }}" class="relative z-10 rounded-full bg-{{ $blog->category->color }}-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-{{ $blog->category->color }}-100 transition-colors">{{ $blog->category->name }}</a>
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
                <a href="/authors/{{ $blog->author->username }}" class="hover:text-gray-600 transition-colors">
                  <span class="absolute inset-0"></span>
                  {{ $blog->author->name }}
                </a>
              </p>
              {{-- <p class="text-gray-600">Co-Founder / CTO</p> --}}
            </div>
          </div>
        </div>
      </article>

  @endforeach
      </div>
  </div>
</x-layout>
