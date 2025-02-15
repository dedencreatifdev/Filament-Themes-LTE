@props(['navigation'])

@php
    $openSidebarClasses =
        'fi-sidebar-open w-[--sidebar-width] translate-x-0 shadow-xl ring-1 ring-gray-950/5 dark:ring-white/10 rtl:-translate-x-0';
    $isRtl = __('filament-panels::layout.direction') === 'rtl';
@endphp

<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a {{ \Filament\Support\generate_href_html(filament()->getHomeUrl()) }} class="brand-link bg-primary">
        <img src="{{ asset('style') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ filament()->getBrandName() }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
            <div class="image">
                <img src="{{ asset('style') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ filament()->getUserName(filament()->auth()->user()) }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::SIDEBAR_NAV_START) }}
        <nav class="mt-2">


            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @foreach ($navigation as $group)
                    <x-filament-panels::sidebar.group :active="$group->isActive()" :collapsible="$group->isCollapsible()" :icon="$group->getIcon()"
                        :items="$group->getItems()" :label="$group->getLabel()" :attributes="\Filament\Support\prepare_inherited_attributes(
                            $group->getExtraSidebarAttributeBag(),
                        )" />
                @endforeach


                

            </ul>


        </nav>
        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::SIDEBAR_NAV_END) }}
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
