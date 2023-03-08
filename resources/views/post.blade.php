@extends('layout')

@section('body')

<div class="mx-auto max-w-2xl mb-4 sm:mb-20 p-4 sm:p-0">
  <div class="mb-8">&LeftArrow; <a href="/" class="text-sm underline decoration-sky-500 hover:decoration-2">Back to homepage</a></div>
  <h1 class="p-name mb0 lh-copy font-bold text-xl">{{ $post['title'] }}</h1>
  <p class="text-xs mb-8 mt-1 text-gray-500">Published on <span class="dt-published" datetime="{{ $post['date'] }}">{{ $post['date'] }}</span></p>

  <div class="prose post mb-12">
    {!! $post['content'] !!}
  </div>

  <div class="mb-2 text-xs">
    <p>Other posts</p>
  </div>
  <nav class="flex justify-between">
    <div>
      @if ($post['next_post'])
      <a href="{{ $post['next_post']['url'] }}" class="mb-2 underline decoration-sky-500 hover:decoration-2" title="Older Post: {{ $post['next_post']['title'] }}">
        &LeftArrow; {{ $post['next_post']['title'] }}
      </a>
      <p class="block text-xs text-gray-400">{{ $post['date'] }}</p>
      @endif
    </div>

    <div>
      @if ($post['previous_post'])
      <a href="{{ $post['previous_post']['url'] }}" class="mb-2 underline decoration-sky-500 hover:decoration-2" title="Newer Post: {{ $post['previous_post']['title'] }}">
        {{ $post['previous_post']['title'] }} &RightArrow;
      </a>
      <p class="block text-xs text-gray-400">{{ $post['date'] }}</p>
      @endif
    </div>
  </nav>
</div>

@endsection
