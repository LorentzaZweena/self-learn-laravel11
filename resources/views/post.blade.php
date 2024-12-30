<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  {{-- $posts = dari route
  $blog = variable yang aku buat sendiri --}}

    {{-- py-8 : vertical padding (margin top & bottom) --}}
    {{-- max-w-screen-md : 768px --}}
    {{-- border-b : border bottom --}}
    {{-- border-gray-300 : border color yg warna gray --}}

    <article class="py-8 max-w-screen-md">

      {{-- mb-1 : margin bottom 1px --}}
      {{-- text-3xl : font size 3xl (30px) --}}
      {{-- tracking-tight : letter spacing --}}
      {{-- text-gray-900 : text color, 900 itu weight nya --}}
      {{-- font-bold : font weight --}}

      {{-- title : dari array posts yang di route --}}
      <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
      <div class="text-base text-gray-500"><a href="#">{{ $post['author'] }}</a> | 2 September 2025</div>
      
      {{-- str::limit() = untuk memotong text --}}
      <p class="my-4 font-light">{{ $post['body']}}</p>
      <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back</a>
    </article>

</x-layout>