<?php

namespace App\Http\Controllers;

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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::orderBy('written_at', 'desc')
            ->get()
            ->map(fn (Post $post) => [
                'id' => $post->id,
                'title' => $post->title,
                'date' => $post->written_at->format('Y-m-d'),
                'url' => route('post.show', ['slug' => $post->slug]),
            ]);

        $latestComic = Comic::orderBy('drawn_at', 'desc')
            ->first();

        return view('home', [
            'posts' => $latestPosts,
            'comic' => [
                'id' => $latestComic->id,
                'title' => $latestComic->title,
                'source' => public_path(''),
            ],
        ]);
    }
}
