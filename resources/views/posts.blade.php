@extends('layout')

@section('body')

<div class="mx-auto max-w-2xl mb-4 sm:mb-20 p-4 sm:p-0">
  <h2>All the posts</h2>
</div>

<div class="mx-auto max-w-2xl p-4 sm:p-0 mb-14">
  <ul class="">
    @foreach ($posts as $post)
    <li class="mb-2">
      <a href="{{ $post['url'] }}" title="Read more - {{ $post['title'] }}" class="underline decoration-sky-500 hover:decoration-2">{{ $post['title'] }}</a>
      <span class="text-xs text-gray-400">{{ $post['date'] }}</span>
    </li>
    @endforeach
  </ul>
</div>

@endsection
