@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">HTTP Recipes</div>

                <div class="card-body">
					<ul>
						@foreach ($recipes as $recipe)
							<li>{{ $recipe->title }}</li>
						@endforeach
					</ul>
                </div>
            </div>
		</div>
		<example-component></example-component>
    </div>
</div>
@endsection
