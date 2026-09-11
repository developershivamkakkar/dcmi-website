<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Album;
use App\Services\SeoService;


class FrontendGalleryController extends Controller
{
    public function school_events(Request $request)
    {
        $albums = Album::where('album_parent_menu', 'School Events')->with('images')->get();
        return view('school-events-gallery', compact('albums'));
    }

    public function events_images($id)
    {
        $album = Album::findOrFail($id);
        $album->load('images');

        app(SeoService::class)->fromAlbum($album);

        return view('show-gallery-images', compact('album'));
    }

    public function infrastructure()
    {
        $albums = Album::where('album_parent_menu', 'Infrastructure')->with('images')->get();
        return view('infrastructure-gallery', compact('albums'));
    }

    public function infra_images($id)
    {
        $album = Album::findOrFail($id);
        $album->load('images');

        app(SeoService::class)->fromAlbum($album);

        return view('show-gallery-images', compact('album'));
    }

    public function activities()
    {
        $albums = Album::where('album_parent_menu', 'Activities')->with('images')->get();
        return view('activities-gallery', compact('albums'));
    }

    public function activities_images($id)
    {
        $album = Album::findOrFail($id);
        $album->load('images');

        app(SeoService::class)->fromAlbum($album);

        return view('show-gallery-images', compact('album'));
    }

    public function news_clippings()
    {
        $albums = Album::where('album_parent_menu', 'News Clippings')->with('images')->get();
        return view('news-clippings', compact('albums'));
    }

    public function news_clippings_images($id)
    {
        $album = Album::findOrFail($id);
        $album->load('images');

        app(SeoService::class)->fromAlbum($album);

        return view('show-gallery-images', compact('album'));
    }

    public function annual_functions()
    {
        $albums = Album::where('album_parent_menu', 'Annual Functions')->with('images')->get();
        return view('annual-functions-gallery', compact('albums'));
    }

    public function annual_functions_images($id)
    {
        $album = Album::findOrFail($id);
        $album->load('images');

        app(SeoService::class)->fromAlbum($album);

        return view('show-gallery-images', compact('album'));
    }
}
