<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  {{-- $posts = dari route
  $blog = variable yang aku buat sendiri --}}

  @foreach ($posts as $blog)
    {{-- py-8 : vertical padding (margin top & bottom) --}}
    {{-- max-w-screen-md : 768px --}}
    {{-- border-b : border bottom --}}
    {{-- border-gray-300 : border color yg warna gray --}}

    <article class="py-8 max-w-screen-md border-b border-gray-300">

      {{-- mb-1 : margin bottom 1px --}}
      {{-- text-3xl : font size 3xl (30px) --}}
      {{-- tracking-tight : letter spacing --}}
      {{-- text-gray-900 : text color, 900 itu weight nya --}}
      {{-- font-bold : font weight --}}

      {{-- title : dari array posts yang di route --}}
      <a href="/posts/{{ $blog['slug'] }}" class="hover:underline"><h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $blog['title'] }}</h2></a>
      {{-- <div class="text-base text-gray-500"><a href="#">{{ $blog['author'] }}</a> | {{ $blog->created_at->format('j F Y') }}</div> kalo mau nampilin tanggal bulan tahun --}}

      <div class="text-base text-gray-500"><a href="#">{{ $blog['author'] }}</a> | {{ $blog->created_at->diffForHumans() }}</div>
      
      {{-- str::limit() = untuk memotong text --}}
      <p class="my-4 font-light">{{ Str::limit($blog['body']), 100 }}</p>
      <a href="/posts/{{ $blog['slug'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
    </article>
  @endforeach

</x-layout>