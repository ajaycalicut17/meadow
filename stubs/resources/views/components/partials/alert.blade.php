@php
$bgColor = '';
$message = '';
if (session('status')) {
    $bgColor = 'bg-green-500 focus:shadow-outline-green';
    $message = session('status');
} elseif (session('success')) {
    $bgColor = 'bg-green-500 focus:shadow-outline-green';
    $message = session('success');
} elseif (session('warning')) {
    $bgColor = 'bg-yellow-500 focus:shadow-outline-yellow';
    $message = session('warning');
} elseif (session('danger')) {
    $bgColor = 'bg-red-500 focus:shadow-outline-red';
    $message = session('danger');
}
@endphp

@if ($bgColor && $message)
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="flex items-center p-4 mb-8 text-sm font-semibold text-white {{ $bgColor }} rounded-lg shadow-md focus:outline-none">
        {{ $message }}
    </div>
@endif
