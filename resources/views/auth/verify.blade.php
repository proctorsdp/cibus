@extends('layouts.app')

@section('content')
<div class="container is-max-desktop">
    {{-- <div class="row justify-content-center"> --}}
        {{-- <div class="col-md-8"> --}}
            <div class="card">
                <div class="card-header">
					<div class="card-header-title title">
						{{ __('Verify Your Email Address') }}
					</div>
				</div>

                <div class="card-content">
                    @if (session('resent'))
                        <div class="notification is-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form method="POST" action="{{ route('verification.resend') }}">
						@csrf
						<div class="control">
							<button type="submit" class="button is-link">{{ __('click here to request another') }}</button>
						</div>
                    </form>
                </div>
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
</div>
@endsection
