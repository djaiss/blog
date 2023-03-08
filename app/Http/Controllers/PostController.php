<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Domains\Contact\ManageLifeEvents\Web\ViewHelpers\ModuleLifeEventViewHelper;
use App\Domains\Vault\ManageVault\Services\CreateVault;
use App\Domains\Vault\ManageVault\Services\DestroyVault;
use App\Domains\Vault\ManageVault\Web\ViewHelpers\VaultCreateViewHelper;
use App\Domains\Vault\ManageVault\Web\ViewHelpers\VaultIndexViewHelper;
use App\Domains\Vault\ManageVault\Web\ViewHelpers\VaultShowViewHelper;
use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Models\Post;
use App\Models\Vault;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('written_at', 'desc')
            ->get()
            ->map(fn (Post $post) => [
                'id' => $post->id,
                'url' => route('post.show', ['slug' => $post->slug]),
                'title' => $post->title,
                'date' => $post->written_at->format('Y-m-d'),
            ]);

        return view('posts', [
            'posts' => $posts,
        ]);
    }

    public function show(string $slug)
    {
        try {
            $post = Post::where('slug', $slug)
                ->firstOrFail();
        } catch (ModelNotFoundException) {
            return redirect()->route('home.index');
        }

        $previousPost = Post::where('written_at', '<', $post->written_at)
            ->orderBy('written_at', 'desc')
            ->first();

        $nextPost = Post::where('written_at', '>', $post->written_at)
            ->orderBy('written_at', 'desc')
            ->first();

        $post->page_view = $post->page_view + 1;
        $post->save();

        return view('post', [
            'post' => [
                'id' => $post->id,
                'slug' => $post->slug,
                'title' => $post->title,
                'date' => $post->written_at->format('Y-m-d'),
                'content' => Str::markdown($post->content),
                'previous_post' => $previousPost ? [
                    'url' => route('post.show', ['slug' => $previousPost->slug]),
                    'title' => $previousPost->title,
                    'date' => $post->written_at->format('Y-m-d'),
                ] : null,
                'next_post' => $nextPost ? [
                    'url' => route('post.show', ['slug' => $nextPost->slug]),
                    'title' => $nextPost->title,
                    'date' => $post->written_at->format('Y-m-d'),
                ] : null,
            ],
        ]);
    }
}
