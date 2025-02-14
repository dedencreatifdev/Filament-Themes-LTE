@props([
    'fullHeight' => false,
])

@php
    use Filament\Pages\SubNavigationPosition;

    $subNavigation = $this->getCachedSubNavigation();
    $subNavigationPosition = $this->getSubNavigationPosition();
    $widgetData = $this->getWidgetData();
@endphp

<div class="content-wrapper">
    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::PAGE_START, scopes: $this->getRenderHookScopes()) }}

    @if ($header = $this->getHeader())
        {{ $header }}
    @elseif ($heading = $this->getHeading())
        @php
            $subheading = $this->getSubheading();
        @endphp

        <x-filament-panels::header :actions="$this->getCachedHeaderActions()" :breadcrumbs="filament()->hasBreadcrumbs() ? $this->getBreadcrumbs() : []" :heading="$heading" :subheading="$subheading">
            @if ($heading instanceof \Illuminate\Contracts\Support\Htmlable)
                <x-slot name="heading">
                    {{ $heading }}
                </x-slot>
            @endif

            @if ($subheading instanceof \Illuminate\Contracts\Support\Htmlable)
                <x-slot name="subheading">
                    {{ $subheading }}
                </x-slot>
            @endif
        </x-filament-panels::header>
    @endif

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::PAGE_END, scopes: $this->getRenderHookScopes()) }}

    <x-filament-panels::unsaved-action-changes-alert />
</div>
