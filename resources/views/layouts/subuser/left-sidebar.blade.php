<!-- ========== Left Sidebar Start ========== -->
@php
$user = auth()->user();
@endphp
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{route('any', 'index')}}" class="logo logo-light">
        <span class="logo-lg">
            <img src="/images/logo.png" alt="{{ __('Logo') }}">
        </span>
        <span class="logo-sm">
            <img src="/images/logo-sm.png" alt="{{ __('Small Logo') }}">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{route('any', 'index')}}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="/images/logo-dark.png" alt="{{ __('Dark Logo') }}">
        </span>
        <span class="logo-sm">
            <img src="/images/logo-dark-sm.png" alt="{{ __('Small Dark Logo') }}">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="{{ __('Show Full Sidebar') }}">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="{{ route('user.dashboard') }}">
                <img src="/images/users/avatar-1.jpg" alt="{{ __('User Image') }}" height="42" class="rounded-circle shadow-sm">
               @if (Auth::check() && Auth::user()->firstname && Auth::user()->lastname)
					<span class="leftbar-user-name mt-2">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
				@else
					<span class="leftbar-user-name mt-2">User</span>
				@endif
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <!-- <li class="side-nav-title">{{ __('Navigation') }}</li> -->

           <li class="side-nav-item">
                <a href="{{ route('user.dashboard') }}" class="side-nav-link">
                   <i class="uil-home-alt"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>
@if ($user->user_type !== 'subuser')
          <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                   aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-user"></i>
                    
                    <span>{{ __('Sub Users') }} </span>
                </a>
                <div class="collapse" id="sidebarDashboards">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('subuser.add')}}">{{ __('Add User') }} </a>
                        </li>
                        <li>
                            <a href="{{route('subuser.listing')}}">{{ __('Listing User') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
   @endif




        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
