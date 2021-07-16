<x-app-layout>
    <x-slot name="header">
        @if (count(Auth::user()->leagues) > 0)
            <x-dropdown>
                <x-slot name="trigger">
                    <button
                        class="flex items-center text-3xl font-extrabold text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        <div>
                            {{ Auth::user()->last_league_id != null ? Auth::user()->last_league->name : 'Select a league' }}
                        </div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    @foreach (Auth::user()->leagues as $league)
                        <x-dropdown-link :href="route('leagues.show', $league)">
                            {{ __($league->name) }}
                        </x-dropdown-link>
                    @endforeach
                    <x-dropdown-link class="border-t-2" :href="route('leagues.create')">
                        {{ __('Create New League') }}
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
            <a href="{{ route('dashboard') }}"
                class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
                {{ __('Picks') }}
            </a>
            <a href="{{ route('dashboard') }}"
                class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
                {{ __('Leaderboard') }}
            </a>
            <a href="{{ route('dashboard') }}"
                class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
                {{ __('Roster') }}
            </a>
            <a href="{{ route('dashboard') }}"
                class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
                {{ __('Invite') }}
            </a>
            <a href="{{ route('dashboard') }}"
                class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
                {{ __('Rules') }}
            </a>
        @endif
    </x-slot>
    <x-flash></x-flash>
    @if (count(Auth::user()->leagues) <= 0)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        To get started, make a League!
                        <br>
                        <a href="{{ route('leagues.create') }}">
                            <x-button class="mt-3">
                                {{ __('Create League') }}
                            </x-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        League Dashboard
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Auth::user()->is_owner)
        <div class="max-w-7xl sm:px-6 lg:px-8 pt-1 absolute bottom-0" style="left: 50%; transform: translateX(-50%);">
            <div class="bg-yellow-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <!-- Heroicon name: solid/exclamation -->
                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-md font-bold text-yellow-800">
                            You have 5 days left on your free trial!
                        </h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>
                                If you want to continue using office pickems after your free trial, setup a subscription
                                <a class="font-bold" href="">here</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
