@extends('layouts.app')

@section('content')
<div class="section">
	<div class="card">
		<div class="card-header">
			<div class="card-header-title title">
				Dashboard
			</div>
		</div>

		<div class="card-content">
			@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
			@endif

			Welcome, {{ Auth::user()->name }}!
		</div>
	</div>
</div>
            {{-- <passport-clients></passport-clients>
            <passport-authorized-clients></passport-authorized-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens> --}}
        {{-- </div> --}}
@endsection
