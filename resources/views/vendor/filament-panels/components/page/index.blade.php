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

    {{-- widget --}}
    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::PAGE_HEADER_WIDGETS_BEFORE, scopes: $this->getRenderHookScopes()) }}

    @if ($headerWidgets = $this->getVisibleHeaderWidgets())
        <x-filament-widgets::widgets :columns="$this->getHeaderWidgetsColumns()" :data="$widgetData" :widgets="$headerWidgets"
            class="fi-page-header-widgets" />
    @endif

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::PAGE_HEADER_WIDGETS_AFTER, scopes: $this->getRenderHookScopes()) }}

    {{ $slot }}

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::PAGE_FOOTER_WIDGETS_BEFORE, scopes: $this->getRenderHookScopes()) }}

    @if ($footerWidgets = $this->getVisibleFooterWidgets())
        <x-filament-widgets::widgets :columns="$this->getFooterWidgetsColumns()" :data="$widgetData" :widgets="$footerWidgets"
            class="fi-page-footer-widgets" />
    @endif

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::PAGE_FOOTER_WIDGETS_AFTER, scopes: $this->getRenderHookScopes()) }}
    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::PAGE_END, scopes: $this->getRenderHookScopes()) }}

    <x-filament-panels::unsaved-action-changes-alert />
</div>
