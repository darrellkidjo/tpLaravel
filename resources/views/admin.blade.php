<div class="container justify-content-center">
	<h2>WELCOME ADMIN </h2>
	<br>
  	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li class="nav-item">
	  		<a class="nav-link active" data-toggle="tab" href="#liste">Liste des emprunts</a>
		</li>
		<li class="nav-item">
		  	<a class="nav-link" data-toggle="tab" href="#create">Ajouter voiture</a>
		</li>
	</ul>

  	<!-- Tab panes -->
	<div class="tab-content">
		<div id="liste" class="container tab-pane active"><br>
			<h3>Listes Des Emprunts</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
		</div>
		<div id="create" class="container tab-pane fade"><br>
			<h3>Ajouter une voiture</h3>
			<form action="{{ route('createVoiture') }}" method="POST" enctype="multipart/form-data">
				@csrf

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
                        <input id="automatique" type="checkbox" checked data-toggle="toggle" class="form-control @error('automatique') is-invalid @enderror" name="automatique" value="{{ old('nbr_place_bagage') }}" required autocomplete="name" autofocus>

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
                        <input id="climatisation" type="checkbox" checked data-toggle="toggle" class="form-control @error('climatisation') is-invalid @enderror" name="climatisation" value="{{ old('nbr_place_bagage') }}" required autocomplete="name" autofocus>

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
	</div>
</div>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
