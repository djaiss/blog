@extends('layout')

@section('body')

<div class="mx-auto max-w-2xl mb-4 sm:mb-20 p-4 sm:p-0">
  <p class="font-medium mb-4">Hi 👋</p>
  <p class=" mb5">My name is Regis. I've created <a href="https://monicahq.com" class="underline decoration-sky-500 hover:decoration-2">Monica</a>, an open source personal CRM, and <a href=" https://officelife.io" class="underline decoration-sky-500 hover:decoration-2">OfficeLife</a>, an open source HR system.</p>
  <p class=" mb5">I never know what to write about, so I draw to express what I want to say.</p>
</div>

<div class="mx-auto max-w-2xl p-4 sm:p-0 mb-14">
  <div class="flex justify-between">
    <h2 class="font-bold mb-6">Latest comic</h2>
  </div>

  <img src="" />
</div>

<div class="mx-auto max-w-2xl p-4 sm:p-0 mb-14">
  <div class="flex justify-between">
    <h2 class="font-bold mb-6">Sometimes I write</h2>
  </div>

  <ul class="">
    @foreach ($posts as $post)
    <li class="mb-2">
      <a href="{{ $post['url'] }}" title="Read more - {{ $post['title'] }}" class="underline block decoration-sky-500 hover:decoration-2">{{ $post['title'] }}</a>
      <span class="text-xs text-gray-400">{{ $post['date'] }}</span>
    </li>
    @endforeach
  </ul>
</div>

@endsection
