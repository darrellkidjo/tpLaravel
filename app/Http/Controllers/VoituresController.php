<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voitures;
use Illuminate\Support\Facades\Redirect;
use \Illuminate\Routing\Controller;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class VoituresController extends Controller
{
	use UploadTrait;
    //
    function CreateVoiture(Request $request)
    {
        $auto = 0;
        $clim = 0;
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
            if($request->input('automatique'))
                $auto = 1;
            if($request->input('climatisation'))
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
    		'image' => $filePath 
    	]);
    	}
    	return Redirect::route('dashboard');
    }

}
