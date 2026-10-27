<?php

namespace App\Http\Controllers;

use App\Services\LegacyStoryRepository;
use Illuminate\Http\Response;

class FeedController extends Controller
{
    public function __construct(private readonly LegacyStoryRepository $stories) {}

    public function index(): Response
    {
        return response()->view('feed.rss', [
            'stories' => $this->stories->stories(null, 50),
            'feedUrl' => config('app.url'),
        ])->header('Content-Type', 'application/rss+xml; charset=UTF-8');
    }
}
