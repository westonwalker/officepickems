<x-app-layout>
    <x-slot name="header">
        @isset($leagues)
            <a href="{{ route('dashboard') }}" class="font-extrabold text-3xl text-gray-800 leading-tight self-center">
                {{ __('🏀 RLI NBA') }}
            </a>
        @endisset
        <a href="{{ route('dashboard') }}" class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
            {{ __('Picks') }}
        </a>
        <a href="{{ route('dashboard') }}" class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
            {{ __('Leaderboard') }}
        </a>
        <a href="{{ route('dashboard') }}" class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
            {{ __('Roster') }}
        </a>
        <a href="{{ route('dashboard') }}" class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
            {{ __('Invite') }}
        </a>
        <a href="{{ route('dashboard') }}" class="font-normal text-lg text-gray-800 leading-tight ml-8 self-center">
            {{ __('Rules') }}
        </a>
    </x-slot>
    @if (Auth::user()->is_owner)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <x-form.form-default routeName="leagues.store">
                        <div class="pt-4 space-y-6 sm:space-y-5">
                            <div>
                                <x-header2>
                                    New League
                                </x-header2>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                    Create a new league. Leagues will end at the regular season of the selected
                                    sport.
                                </p>
                            </div>
                            <div class="space-y-6 sm:space-y-5">
                                <x-form.input-text-default label="League name" name="name" autoComplete="league-name"
                                    :required="true">
                                </x-form.input-text-default>
                                <x-form.select-default label="League type" nullOption="Choose a league" required="true"
                                    name="league_types" :data="$leagueTypes" :required="true">
                                </x-form.select-default>
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="league_types"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        How it works
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <ul class="list-disc text-sm font-medium text-gray-700">
                                            <li>Once you create the league, you can invite your
                                                coworkers to participate.</li>
                                            <li>Every week, players will pick the winners of 10 hand picked games
                                                from the sport you selected.</li>
                                            <li>Every pick that is correct will award 1 point to the player.</li>
                                            <li>At the end of the regular season, the player with the most points is
                                                crowned champion of the league.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-form.form-default>
                </div>
            </div>
        </div>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        You are not authorized to create leagues for {{ Auth::user()->company->company_name }} 🙁
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (Auth::user()->is_owner)
        <div class="hidden sm:block fixed bottom-0 left-0 w-80">
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
