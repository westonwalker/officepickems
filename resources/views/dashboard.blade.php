<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('dashboard') }}" class="font-extrabold text-3xl text-gray-800 leading-tight self-center">
            {{ __('🏀 RLI NBA') }}
        </a>
        <a href="{{ route('dashboard') }}" class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
            {{ __('Leaderboard') }}
        </a>
        <a href="{{ route('dashboard') }}" class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
            {{ __('Picks') }}
        </a>
        <a href="{{ route('dashboard') }}" class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
            {{ __('Roster') }}
        </a>
        <a href="{{ route('dashboard') }}" class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
            {{ __('Rules') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
