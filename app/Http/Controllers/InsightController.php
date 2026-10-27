<?php

namespace App\Http\Controllers;

use App\Services\LegacyStoryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class InsightController extends Controller
{
    public function __construct(private readonly LegacyStoryRepository $stories) {}

    public function index(): View
    {
        return view('insight.index', ['stories' => $this->stories->stories(null, 12)]);
    }

    public function create(): View
    {
        return view('insight.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'tag' => ['required', 'in:dongeng,fabel,folklore'],
            'description' => ['required', 'string', 'max:15000'],
            'paragraph1' => ['nullable', 'string', 'max:15000'],
            'paragraph2' => ['nullable', 'string', 'max:15000'],
            'paragraph3' => ['nullable', 'string', 'max:15000'],
            'picture' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:6144'],
        ]);

        if (! $this->stories->legacyIsConfigured()) {
            return back()->withErrors(['database' => 'Koneksi database Go-Dongeng belum diatur di .env.'])->withInput();
        }

        $picture = $request->file('picture');
        $imageName = Str::uuid()->toString().'.'.$picture->extension();
        $picture->move(public_path('assets/theme/default/images/content'), $imageName);
        $uri = $this->stories->saveStory($data, (int) $request->user()->getAuthIdentifier(), $imageName);

        if ($uri === null) {
            @unlink(public_path('assets/theme/default/images/content/'.$imageName));

            return back()->withErrors(['database' => 'Cerita belum dapat disimpan. Pastikan skema database lama tersedia.'])->withInput();
        }

        return redirect('/'.ltrim($uri, '/'))->with('status', 'Cerita berhasil diterbitkan.');
    }
}
