@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
            
                    @if ($role === 'superadmin')
                        <div class="alert alert-success">
                            This is the Superadmin Dashboard. You have full access to the system.
                        </div>
                    @elseif ($role === 'admin')
                        <div class="alert alert-info">
                            This is the Admin Dashboard. You have limited access to the system.
                        </div>
                    @else
                        <div class="alert alert-warning">
                            This is the User Dashboard. You have restricted access to the system.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
