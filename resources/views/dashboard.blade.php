@extends('layouts.appbc')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <!-- Left Section: Welcome & Diagnosis Button -->
        <div class="col-lg-6 col-md-8 col-sm-12 mb-4">
            <div class="card shadow-lg border-0 rounded-lg h-100 d-flex flex-column">
                <x-app-layout>
                    <x-slot name="header">
                        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Dashboard') }}
                        </h2> --}}
                    </x-slot>
                
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    {{ __("You're logged in!") }}
                                </div>
                            </div>
                        </div>
                    </div>
                </x-app-layout>
                
            </div>
        </div>     
    </div>

    
</div>
@endsection
