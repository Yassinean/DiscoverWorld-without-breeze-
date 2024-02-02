<?php

namespace App\Http\Controllers;

use App\Models\Recit;
use App\Models\RecitImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecitsController extends Controller
{
    public function addAventure(Request $request)
    {
        $data = $request->validate([
            'destination' => 'required',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'conseils' => 'required',
        ]);

        $userId = Auth::id();

        $newAventure = Recit::create([
            'user_id' => $userId,
            'destination' => $data['destination'],
            'description' => $data['description'],
            'conseils' => $data['conseils'],
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/images', $filename);

                $newAventureImage = RecitImages::create([
                    'image' => $filename,
                    'recit_id' => $newAventure->id
                ]);
            }

            return redirect()->route('utilisateur')->with('success', 'Aventure ajoutée avec succès!');
        } else {
            return back()->with('error', 'Aucune image téléchargée!');
        }
    }
    public function afficherAventuresUser()
    {
        $userId = Auth::id();
        $aventures = Recit::where('user_id', $userId)->with('images')->get();
        return view('utilisateur', compact('aventures'));
    }

    public function afficherAll()
    {
        $aventures = Recit::with('images')->get();
        return view('welcome', compact('aventures'));
    }

    public function filterDesc()
    {
        $aventures = Recit::with('images')->orderBy('id', 'desc')->get();
        return view('welcome', compact('aventures'));
    }

    public function filterAsc()
    {
        $aventures = Recit::with('images')->orderBy('id', 'asc')->get();
        return view('welcome', compact('aventures'));
    }

    public function filterDestination(Request $request)
    {
        $destination = $request->input('destination');
        if ($destination === 'Tout') {
            $aventures = Recit::with('images')->get();
        } else {
            $aventures = Recit::where('destination', $destination)->with('images')->get();
        }
        return view('welcome', compact('aventures'));
    }

    public function singleAventure(Request $request)
    {
        $id = $request->query('id');
        $singleAventure = Recit::where('id', $id)->with('images', 'user')->get();
        return view('singleAventure', compact('singleAventure'));
    }

}
