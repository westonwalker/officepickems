@if (session('success'))
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-flash-success></x-flash-success>
    </div>
@elseif (session('error'))
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-flash-error></x-flash-error>
    </div>
@elseif (session('info'))
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-flash-info></x-flash-info>
    </div>
@elseif (session('warning'))
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-flash-warning></x-flash-warning>
    </div>
@endif
