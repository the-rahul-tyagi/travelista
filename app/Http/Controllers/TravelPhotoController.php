<?php

namespace App\Http\Controllers;

use App\Models\TravelPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;

class TravelPhotoController extends Controller
{
    /**
     * Display a listing of the user's travel photos.
     */
    public function index()
    {
        $photos = auth()->user()->travelPhotos()->latest()->get();
        return view('travel-photos.index', compact('photos'));
    }

    /**
     * Store a newly uploaded travel photo in storage and database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // max 5MB
            'title' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:1000',
            'location' => 'nullable|string|max:255',
        ]);

        try {
            if ($request->hasFile('image')) {
                // Store the photo in the public 'travel_photos' directory
                $imagePath = $request->file('image')->store('travel_photos', 'public');

                // Save reference in the database
                auth()->user()->travelPhotos()->create([
                    'title' => $request->title ?? 'Untitled Expedition',
                    'caption' => $request->caption,
                    'image_path' => $imagePath,
                    'location' => $request->location,
                ]);

                return redirect()->route('travel-photos.index')->with('success', 'Your beautiful travel photo has been published to your gallery!');
            }

            return back()->with('error', 'No image file was provided.');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Failed to upload photo. Please check file constraints and try again.');
        }
    }

    /**
     * Remove the specified travel photo from storage and database.
     */
    public function destroy(TravelPhoto $photo)
    {
        // Enforce authorization: User must own the photo
        if (auth()->id() !== $photo->user_id) {
            abort(403, 'Unauthorized action.');
        }

        try {
            // Delete the image file from public disk
            if (Storage::disk('public')->exists($photo->image_path)) {
                Storage::disk('public')->delete($photo->image_path);
            }

            // Delete database reference
            $photo->delete();

            return redirect()->route('travel-photos.index')->with('success', 'Photo removed from your travel portfolio.');
        } catch (Exception $e) {
            return back()->with('error', 'Failed to remove the photo.');
        }
    }
}
