<?php 
	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	/**
	 * 
	 */
	class Voiture extends Model
	{
		protected $table = "voitures";

		protected $fillable = ["id", "marque", "designation", "nbr_portiere", "nbr_siege", "nbr_place_bagage", "automatique", "climatisation", "plus_details"];
		
	}

?>