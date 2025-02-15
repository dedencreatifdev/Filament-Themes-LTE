@props([
    'active' => false,
    'activeChildItems' => false,
    'activeIcon' => null,
    'badge' => null,
    'badgeColor' => null,
    'badgeTooltip' => null,
    'childItems' => [],
    'first' => false,
    'grouped' => false,
    'icon' => null,
    'last' => false,
    'shouldOpenUrlInNewTab' => false,
    'sidebarCollapsible' => true,
    'subGrouped' => false,
    'url',
])

@php
    $sidebarCollapsible = $sidebarCollapsible && filament()->isSidebarCollapsibleOnDesktop();
@endphp

<li class="nav-item">
    <a {{ \Filament\Support\generate_href_html($url, $shouldOpenUrlInNewTab) }} class="nav-link {{ $active ? 'active' : '' }}">
        <i class="mr-2">
            <x-filament::icon :icon="$active && $activeIcon ? $activeIcon : $icon" :x-show="$subGrouped && $sidebarCollapsible ? '! $store.sidebar.isOpen' : false" @class([
                'fi-sidebar-item-icon h-6 w-6',
                'text-gray-400 dark:text-gray-500' => !$active,
                'text-primary-600 dark:text-primary-400' => $active,
            ]) @style(['height:20px']) />

        </i>
        <p>
            {{ $slot }}
            <span class="right badge badge-danger">New</span>
        </p>
    </a>
</li>
