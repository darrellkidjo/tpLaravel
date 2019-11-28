<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voitures;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Routing\Controller;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use App\User;
use App\Models\Locations;
use Illuminate\Support\Facades\Auth;

class VoituresController extends Controller
{
	use UploadTrait;
    //
     private $auto = 0;
    private $clim = 0;
    function CreateVoiture(Request $request)
    {
      
    	if($request->has('image'))
    	{
    		// Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('designation')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            if($request->has('automatique'))
                $auto = 1;
            if($request->has('climatisation'))
                $clim = 1;

            Voitures::create([
    		'marque' => $request->input('marque'),
    		'designation' => $request->input('designation'),
    		'nbr_portiere' => $request->input('nbr_portiere'),
    		'nbr_siege' => $request->input('nbr_siege'),
    		'nbr_place_bagage' => $request->input('nbr_place_bagage'),
    		'automatique' => $auto,
    		'climatisation' => $clim,
    		'plus_details' => $request->input('plus_details'),
    		'image' => $filePath,
            'user_id' => $request->input('id')  
    	]);
    	}
    	return Redirect::route('dashboard');
    }

    /*Fonction for user*/
    function MyAllLocation(Request $request)
    {
        
    }

    function AllVoiture(Request $request)
    {
        if(Auth::user()->is_admin == 1)
        {
            $voitures = Voitures::all();
            $loc = Locations::all();
            foreach ($loc as $key => $value) {
                $user = User::where('id', '=', $value['user_id'])->get();
                $voiture = Voitures::where('id', '=', $value['voiture_id'])->get();
                $value['user_id'] = $user[0]['nom'].' '.$user[0]['prenom'];
                $value['voiture_id'] = $voiture[0]['marque'].' '.$voiture[0]['designation'];
                $loc[$key] = $value;
            }

            return view('dashboard', compact('voitures', 'loc'));
        }
        elseif (Auth::user()->is_admin == 0) {
            $locat = Locations::where('user_id', '=', Auth::user()->id)->get();
            foreach ($locat as $key => $value) {
                $voiture = Voitures::where('id', '=', $value['voiture_id'])->get();
                $value['user_id'] = Auth::user()->nom.' '.Auth::user()->prenom;
                $value['voiture_id'] = $voiture[0]['marque'].' '.$voiture[0]['designation'];
                $locat[$key] = $value;

            }
                //print_r($loc);
            return view('dashboard', compact('locat'));
        }
        
    }
    function AllVoitureAcceuil(Request $request)
    {
        $voitures = Voitures::all();
        return view('listeVoiture', compact('voitures'));
    }

    function SupprimerVoiture(Request $request)
    {
        Voitures::where('id', '=', $request->input('id'))->delete();
        return Redirect::route('dashboard');
    }

    function ChoisirVoiture(Request $request)
    {
        $selectedVoiture = Voitures::where('id', '=', $request->input('id'))->get();
        return view('modificationVoiture', compact('selectedVoiture'));
    }

    function ModifierVoiture(Request $request)
    {
        // Get image file
        $image = $request->file('image');
        // Make a image name based on user name and current timestamp
        $name = Str::slug($request->input('designation')).'_'.time();
        // Define folder path
        $folder = '/uploads/images/';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        // Upload image
        $this->uploadOne($image, $folder, 'public', $name);
        if($request->has('automatique'))
            $auto = 1;
        if($request->has('climatisation'))
            $clim = 1;

        Voitures::where('id', '=', $request->input('id'))->update([
            'marque' => $request->input('marque'),
            'designation' => $request->input('designation'),
            'nbr_portiere' => $request->input('nbr_portiere'),
            'nbr_siege' => $request->input('nbr_siege'),
            'nbr_place_bagage' => $request->input('nbr_place_bagage'),
            'automatique' => $auto,
            'climatisation' => $clim,
            'plus_details' => $request->input('plus_details'),
            'image' => $filePath 
        ]);

        return Redirect::route('dashboard');
    }

    
}
