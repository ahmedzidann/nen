<?php

namespace App\Http\Controllers\Admin\Homepage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Homepage\VideoRequest;
use App\Models\HomeVideo;
use App\ViewModels\HomeVideoView\HomeVideoViewModel;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $record = HomeVideo::first();
        return view('admin.homepage.video.index', compact('record'));
    }

    public function create()
    {
        if (HomeVideo::exists()) {
            return redirect()->route('admin.homepage.video.index')
                ->with('info', 'A video record already exists. Please edit it instead.');
        }
        return view('admin.homepage.video.create', new HomeVideoViewModel());
    }

    public function store(VideoRequest $request)
    {
        if (HomeVideo::exists()) {
            return redirect()->route('admin.homepage.video.index')
                ->with('info', 'A video record already exists.');
        }

        $data = $request->validated();
        $data['youtube_url'] = $this->toEmbedUrl($data['youtube_url']);

        HomeVideo::create($data);

        return redirect()->route('admin.homepage.video.index')
            ->with('add', 'Video section created successfully.');
    }

    public function edit($id)
    {
        $record = HomeVideo::findOrFail($id);
        return view('admin.homepage.video.edit', new HomeVideoViewModel($record));
    }

    public function update(VideoRequest $request, $id)
    {
        $record = HomeVideo::findOrFail($id);
        $data = $request->validated();
        $data['youtube_url'] = $this->toEmbedUrl($data['youtube_url']);
        $record->update($data);

        return redirect()->route('admin.homepage.video.index')
            ->with('update', 'Video section updated successfully.');
    }

    private function toEmbedUrl(string $url): string
    {
        // Already embed format
        if (str_contains($url, '/embed/')) {
            return $url;
        }

        // youtu.be/VIDEO_ID
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }

        // youtube.com/watch?v=VIDEO_ID
        if (preg_match('/[?&]v=([a-zA-Z0-9_-]+)/', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1];
        }

        return $url;
    }
}
