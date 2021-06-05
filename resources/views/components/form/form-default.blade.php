@props(['method' => 'POST', 'routeName', 'submitButtonContent' => 'Create'])
<form method="{{ $method }}" action="{{ route($routeName) }}" class="p-6">
    @csrf
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        {{ $slot }}
    </div>
    <div class="pt-5">
        <div class="flex justify-end">
            <a href="{{ url()->previous() }}">
                <button type="button"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </button>
            </a>
            <button type="submit"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ $submitButtonContent }}
            </button>
        </div>
    </div>
</form>
