<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlShortenerController extends Controller
{
    public function create()
    {
        return view('shorten.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'long_url' => 'required|url',
        ]);

        $shortUrl = new ShortUrl();
        $shortUrl->user_id = auth()->id();
        $shortUrl->long_url = $request->long_url;
        $shortUrl->short_url = Str::random(6);
        $shortUrl->save();

        return redirect()->route('shorten.statistics')->with('success', 'Short URL created successfully');
    }

    public function redirect($shortUrl)
    {
        $url = ShortUrl::where('short_url', $shortUrl)->firstOrFail();
        $url->increment('click_count');
        return redirect($url->long_url);
    }

    public function statistics()
    {
        $urls = ShortUrl::where('user_id', auth()->id())->get();
        return view('shorten.statistics', compact('urls'));
    }

    public function edit($id)
    {
        $url = ShortUrl::findOrFail($id);
        return view('shorten.create', compact('url'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'long_url' => 'required|url',
        ]);

        $url = ShortUrl::findOrFail($id);
        $url->update([
            'long_url' => $request->long_url,
        ]);

        return redirect()->route('shorten.statistics')->with('success', 'Short URL updated successfully!');
    }
    
    public function destroy($id)
    {
        $url = ShortUrl::findOrFail($id);
        $url->delete();

        return redirect()->route('shorten.statistics')->with('success', 'Short URL deleted successfully');
    }
}
