<div class="container justify-content-center">
	<h2>WELCOME ADMIN </h2>
	<br>
  	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
	  		<a class="nav-link active" data-toggle="tab" href="#liste">Liste des Voitures</a>
		</li>
		<li class="nav-item">
		  	<a class="nav-link" data-toggle="tab" href="#create">Ajouter Voiture</a>
		</li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#location">Liste des Locations</a>
        </li>
	</ul>

  	<!-- Tab panes -->
	<div class="tab-content">
        {{--=======Liste des voitures=======--}}
		<div id="liste" class="container tab-pane active"><br>
			<h3>Listes Des Voitures</h3>
			<div class="row justify-content-center">
				@foreach($voitures as $voiture)
					<div class="card col-md-4">
					  <img src="{{ asset('uploads'.$voiture->image) }}" class="card-img-top" alt="..." width="100px" height="200px">
                      <hr>
					  <div class="card-body">
					    <h5 class="card-title"> {{ $voiture->marque }} &nbsp; {{ $voiture->designation }} </h5>
					    <div class="card-text">
					    	<div class="row">
					    		<label class="col-md-6">Nbr Port : {{ $voiture->nbr_portiere }} </label>
					    		<label class="col-md-6">Nbr Sieg : {{ $voiture->nbr_siege }} </label>
					    	</div>
					    	<div class="row">
					    		<label class="col-md-6">Nbr PBag : {{ $voiture->nbr_place_bagage }} </label><br>
						    	@if($voiture->automatique == 0)
						    		<label class="col-md-6">Manuelle </label>
						    	@else
						    		<label class="col-md-6">Automatique </label>
						    	@endif
					    	</div>
					    	<div class="row">
					    		@if($voiture->climatisation == 0)
						    		<label class="col-md-6">Clime : Non </label>
						    	@else
						    		<label class="col-md-6"> Clim : Oui </label>
						    	@endif
					    	</div>
					    	<div class="row">
					    		<p class="text-right">
					    			{{ $voiture->plus_details }}
					    		</p>
					    	</div>
					    	
					    </div>
					    <div class="row">
				    	<form action="{{ route('modifierVoiture') }}" method="POST">
                             @csrf
					    	<input type="hidden" value="{{ $voiture->id }}" name="id">
					    	<input type="submit" value="MODIFIER" class="btn btn-primary">
				       </form>
					    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				     	<form action="{{ route('supprimerVoiture') }}" method="POST">
                             @csrf
					    	<input type="hidden" value="{{ $voiture->id }}" name="id">
					    	<input type="submit" value="SUPPRIMER" class="btn btn-danger">
					    </form>
					    </div>
					  </div>
					</div>
				@endforeach
			</div>
		</div>
        {{--=======Créer une voiture=======--}}
		<div id="create" class="container tab-pane fade"><br>
			<h3>Ajouter une voiture</h3>
			<form action="{{ route('createVoiture') }}" method="POST" enctype="multipart/form-data">
				@csrf
                <input type="hidden" value="{{ auth()->user()->id }}" name="id">
				<div class="form-group row">
                    <label for="marque" class="col-md-4 col-form-label text-md-right">{{ __('Marque') }}</label>
                    <div class="col-md-6">
                        <input id="marque" type="text" class="form-control @error('marque') is-invalid @enderror" name="marque" value="{{ old('marque') }}" required autocomplete="name" autofocus>

                        @error('marque')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('Désignation') }}</label>
                    <div class="col-md-6">
                        <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="name" autofocus>

                        @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nbr_portiere" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de portière') }}</label>
                    <div class="col-md-6">
                        <input id="nbr_portiere" type="number" class="form-control @error('nbr_portiere') is-invalid @enderror" name="nbr_portiere" value="{{ old('nbr_portiere') }}" required autocomplete="name" autofocus min="0">

                        @error('nbr_portiere')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nbr_siege" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de Siège') }}</label>
                    <div class="col-md-6">
                        <input id="nbr_siege" type="number" class="form-control @error('nbr_siege') is-invalid @enderror" name="nbr_siege" value="{{ old('nbr_siege') }}" required autocomplete="name" autofocus min="0">

                        @error('nbr_siege')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nbr_place_bagage" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de place bagage') }}</label>
                    <div class="col-md-6">
                        <input id="nbr_place_bagage" type="number" class="form-control @error('nbr_place_bagage') is-invalid @enderror" name="nbr_place_bagage" value="{{ old('nbr_place_bagage') }}" required autocomplete="name" autofocus min="0">

                        @error('nbr_place_bagage')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
          
            	<div class="form-group row">
                    <label for="automatique" class="col-md-4 col-form-label text-md-right">{{ __('Voiture Automatique') }}</label>
                    <div class="col-md-6">
                        <input id="automatique" type="checkbox" data-toggle="toggle" class="form-control @error('automatique') is-invalid @enderror" name="automatique"  autocomplete="name" autofocus>

                        @error('automatique')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="climatisation" class="col-md-4 col-form-label text-md-right">{{ __('Climatisation') }}</label>
                    <div class="col-md-6">
                        <input id="climatisation" type="checkbox" checked data-toggle="toggle" class="form-control @error('climatisation') is-invalid @enderror" name="climatisation" autocomplete="name" autofocus>

                        @error('climatisation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="plus_details" class="col-md-4 col-form-label text-md-right">{{ __('Plus De Détails') }}</label>
                    <div class="col-md-6">
	            	 	<textarea id="plus_details" rows="3" class="form-control @error('plus_details') is-invalid @enderror" name="plus_details" value="{{ old('nbr_place_bagage') }}" required autocomplete="name" autofocus></textarea>
	                    @error('plus_details')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
                    </div>
                </div>
             	<div class="form-group row">
				    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
				    <div class="col-md-6">
				    	<input type="file" class="form-control-file" id="image" name="image" required autocomplete="name" autofocus>
				    </div>
			  	</div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('CREE') }}
                        </button>
                    </div>
                </div>
			</form>
		</div>
        {{--=======Liste des locations=======--}}
        <div id="location" class="container tab-pane"><br>
            <h3>Listes Des Locations</h3>
                <div class="row justify-content-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nom & Prénom</th>
                                <th scope="col">Marque & Désignation </th>
                                <th scope="col">Date de location </th>
                                <th scope="col">Date de fin de location </th>
                                <th scope="col">Disponible</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loc as $elemnt)
                                <tr>
                                    <th scope="row">{{ $elemnt->user_id }}</th>
                                    <td>{{ $elemnt->voiture_id }}</td>
                                    <td>{{ $elemnt->date_debut }}</td>
                                    <td>{{ $elemnt->date_fin }}</td>
                                    @if($elemnt->rendu == 0)
                                        <td>Non</td>
                                    @else
                                        <td>Oui</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>   
        </div>
	</div>
</div>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
