@php
    use Filament\Support\Enums\MaxWidth;
    $navigation = filament()->getNavigation();
@endphp

<x-filament-panels::layout.base :livewire="$livewire">
    <div class="wrapper">
        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::TOPBAR_BEFORE, scopes: $livewire->getRenderHookScopes()) }}
        @if (!filament()->hasTopNavigation() && filament()->hasNavigation() && filament()->auth()->check())
            {{-- <x-filament-panels::topbar :navigation="$navigation" /> --}}
            sidebar
        @elseif(filament()->hasTopNavigation() && filament()->hasNavigation() && filament()->auth()->check())
            topbar
        @endif
        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::TOPBAR_AFTER, scopes: $livewire->getRenderHookScopes()) }}

    
    </div>
</x-filament-panels::layout.base>
