

<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('any', 'index') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="/images/logo.png" alt="{{ __('Logo') }}">
        </span>
        <span class="logo-sm">
            <img src="/images/logo-sm.png" alt="{{ __('Small Logo') }}">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route('any', 'index') }}" class="logo logo-dark">
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
            <a href="{{ route('home') }}">
                <img src="/images/users/avatar-1.jpg" alt="{{ __('User Image') }}" height="42" class="rounded-circle shadow-sm">
				@if (Auth::check() && Auth::user()->name)
					<span class="leftbar-user-name mt-2">{{ Auth::user()->name }}</span>
				@else
					<span class="leftbar-user-name mt-2">Admin</span>
				@endif

              
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

          
<li class="side-nav-item">
                <a href="{{ route('home') }}" class="side-nav-link">
                   <i class="uil-home-alt"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                   <i class="uil-user"></i>

                    <span>{{ __('Users') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('user.add') }}">{{ __('Add User') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('user.listing') }}">{{ __('Listing User') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
			 <li class="side-nav-item">
                <a href="{{ route('admin.deletedUser') }}" class="side-nav-link">
                   <i class="uil-trash-alt"></i>
                    <span>{{ __('Deleted User') }}</span>
                </a>
            </li>
			<li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce1" aria-expanded="false" aria-controls="sidebarEcommerce1" class="side-nav-link">
                     <i class="uil-clipboard-alt"></i>
                    <span>{{ __('Language') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce1">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('language.add') }}">{{ __('Add Language') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('language.listing') }}">{{ __('Listing Language') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
           <li class="side-nav-item">
                <a href="{{ route('admin.ips_listing') }}" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span>{{ __('IPs Listing') }}</span>
                </a>
            </li>
			
            <!--li class="side-nav-item">
                <a href="{{ route('second', ['apps', 'chat']) }}" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span>{{ __('Chat') }}</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
                    <i class="uil uil-tachometer-fast"></i>
                    <span class="badge bg-danger text-white float-end">{{ __('New') }}</span>
                    <span>{{ __('CRM') }}</span>
                </a>
                <div class="collapse" id="sidebarCrm">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['crm', 'projects']) }}">{{ __('Projects') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['crm', 'orders-list']) }}">{{ __('Orders List') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['crm', 'clients']) }}">{{ __('Clients') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['crm', 'management']) }}">{{ __('Management') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span>{{ __('Ecommerce') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['ecommerce', 'products']) }}">{{ __('Products') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ecommerce', 'products-details']) }}">{{ __('Products Details') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ecommerce', 'orders']) }}">{{ __('Orders') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ecommerce', 'orders-details']) }}">{{ __('Order Details') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ecommerce', 'customers']) }}">{{ __('Customers') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ecommerce', 'shopping-cart']) }}">{{ __('Shopping Cart') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ecommerce', 'checkout']) }}">{{ __('Checkout') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ecommerce', 'sellers']) }}">{{ __('Sellers') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span>{{ __('Email') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['email', 'inbox']) }}">{{ __('Inbox') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['email', 'read']) }}">{{ __('Read Email') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProjects" aria-expanded="false" aria-controls="sidebarProjects" class="side-nav-link">
                    <i class="uil-briefcase"></i>
                    <span>{{ __('Projects') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProjects">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['projects', 'list']) }}">{{ __('List') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['projects', 'details']) }}">{{ __('Details') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['projects', 'gantt']) }}">{{ __('Gantt') }} <span class="badge rounded-pill bg-light text-dark font-10 float-end">{{ __('New') }}</span></a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['projects', 'add']) }}">{{ __('Create Project') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('second', ['apps', 'social-feed']) }}" class="side-nav-link">
                    <i class="uil-rss"></i>
                    <span>{{ __('Social Feed') }}</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                    <i class="uil-clipboard-alt"></i>
                    <span>{{ __('Tasks') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTasks">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['tasks', 'tasks']) }}">{{ __('List') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['tasks', 'details']) }}">{{ __('Details') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['tasks', 'kanban']) }}">{{ __('Kanban Board') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('second', ['apps', 'file-manager']) }}" class="side-nav-link">
                    <i class="uil-folder-plus"></i>
                    <span>{{ __('File Manager') }}</span>
                </a>
            </li>

            <li class="side-nav-title">{{ __('Custom') }}</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="uil-copy-alt"></i>
                    <span>{{ __('Pages') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['pages', 'profile']) }}">{{ __('Profile') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['pages', 'profile-2']) }}">{{ __('Profile 2') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['pages', 'invoice']) }}">{{ __('Invoice') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['pages', 'faq']) }}">{{ __('FAQ') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['pages', 'pricing']) }}">{{ __('Pricing') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['pages', 'maintenance']) }}">{{ __('Maintenance') }}</a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                <span>{{ __('Authentication') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPagesAuth">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ route('second', ['auth', 'login']) }}">{{ __('Login') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['auth', 'login-2']) }}">{{ __('Login 2') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['auth', 'register']) }}">{{ __('Register') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['auth', 'register-2']) }}">{{ __('Register 2') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['auth', 'logout']) }}">{{ __('Logout') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['auth', 'logout-2']) }}">{{ __('Logout 2') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['auth', 'recoverpw']) }}">{{ __('Recover Password') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['auth', 'recoverpw-2']) }}">{{ __('Recover Password 2') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['auth', 'lock-screen']) }}">{{ __('Lock Screen') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['auth', 'lock-screen-2']) }}">{{ __('Lock Screen 2') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['auth', 'confirm-mail']) }}">{{ __('Confirm Mail') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['auth', 'confirm-mail-2']) }}">{{ __('Confirm Mail 2') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPagesError" aria-expanded="false" aria-controls="sidebarPagesError">
                                <span>{{ __('Error') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPagesError">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ route('second', ['error', '404']) }}">{{ __('Error 404') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['error', '404-alt']) }}">{{ __('Error 404-alt') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['error', '500']) }}">{{ __('Error 500') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('second', ['pages', 'starter']) }}">{{ __('Starter Page') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['pages', 'preloader']) }}">{{ __('With Preloader') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['pages', 'timeline']) }}">{{ __('Timeline') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('any', 'landing') }}" target="_blank" class="side-nav-link">
                    <i class="uil-globe"></i>
                    <span class="badge text-bg-secondary float-end">{{ __('New') }}</span>
                    <span>{{ __('Landing') }}</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                    <i class="uil-window"></i>
                    <span>{{ __('Layouts') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarLayouts">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['layouts-eg', 'horizontal']) }}" target="_blank">{{ __('Horizontal') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['layouts-eg', 'vertical']) }}" target="_blank">{{ __('Vertical') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['layouts-eg', 'full']) }}" target="_blank">{{ __('Full View') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['layouts-eg', 'fullscreen']) }}" target="_blank">{{ __('Fullscreen View') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['layouts-eg', 'hover']) }}" target="_blank">{{ __('Hover Menu') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['layouts-eg', 'compact']) }}" target="_blank">{{ __('Compact') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['layouts-eg', 'icon-view']) }}" target="_blank">{{ __('Icon View') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">{{ __('Components') }}</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI" class="side-nav-link">
                    <i class="uil-box"></i>
                    <span>{{ __('Base UI') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBaseUI">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['ui', 'accordions']) }}">{{ __('Accordions & Collapse') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'alerts']) }}">{{ __('Alerts') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'avatars']) }}">{{ __('Avatars') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'badges']) }}">{{ __('Badges') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'breadcrumb']) }}">{{ __('Breadcrumb') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'buttons']) }}">{{ __('Buttons') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'cards']) }}">{{ __('Cards') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'carousel']) }}">{{ __('Carousel') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'dropdowns']) }}">{{ __('Dropdowns') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'embed-video']) }}">{{ __('Embed Video') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'grid']) }}">{{ __('Grid') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'list-group']) }}">{{ __('List Group') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'modals']) }}">{{ __('Modals') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'notifications']) }}">{{ __('Notifications') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'offcanvas']) }}">{{ __('Offcanvas') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'placeholders']) }}">{{ __('Placeholders') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'pagination']) }}">{{ __('Pagination') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'popovers']) }}">{{ __('Popovers') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'progress']) }}">{{ __('Progress') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'ribbons']) }}">{{ __('Ribbons') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'spinners']) }}">{{ __('Spinners') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'tabs']) }}">{{ __('Tabs') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'tooltips']) }}">{{ __('Tooltips') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'links']) }}">{{ __('Links') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'typography']) }}">{{ __('Typography') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['ui', 'utilities']) }}">{{ __('Utilities') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false" aria-controls="sidebarExtendedUI" class="side-nav-link">
                    <i class="uil-package"></i>
                    <span>{{ __('Extended UI') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarExtendedUI">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['extended', 'dragula']) }}">{{ __('Dragula') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['extended', 'range-slider']) }}">{{ __('Range Slider') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['extended', 'ratings']) }}">{{ __('Ratings') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['extended', 'scrollbar']) }}">{{ __('Scrollbar') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['extended', 'scrollspy']) }}">{{ __('Scrollspy') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['extended', 'treeview']) }}">{{ __('Treeview') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('any', 'widgets') }}" class="side-nav-link">
                    <i class="uil-layer-group"></i>
                    <span>{{ __('Widgets') }}</span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons" class="side-nav-link">
                    <i class="uil-streering"></i>
                    <span>{{ __('Icons') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarIcons">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['icons', 'remixicons']) }}">{{ __('Remix Icons') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['icons', 'mdi']) }}">{{ __('Material Design') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['icons', 'unicons']) }}">{{ __('Unicons') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['icons', 'lucide']) }}">{{ __('Lucide') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts" class="side-nav-link">
                    <i class="uil-chart"></i>
                    <span>{{ __('Charts') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarCharts">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarApexCharts" aria-expanded="false" aria-controls="sidebarApexCharts">
                                <span>{{ __('Apex Charts') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarApexCharts">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-area']) }}">{{ __('Area') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-bar']) }}">{{ __('Bar') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-bubble']) }}">{{ __('Bubble') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-candlestick']) }}">{{ __('Candlestick') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-column']) }}">{{ __('Column') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-heatmap']) }}">{{ __('Heatmap') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-line']) }}">{{ __('Line') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-mixed']) }}">{{ __('Mixed') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-timeline']) }}">{{ __('Timeline') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-boxplot']) }}">{{ __('Boxplot') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-treemap']) }}">{{ __('Treemap') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-pie']) }}">{{ __('Pie') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-radar']) }}">{{ __('Radar') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-radialbar']) }}">{{ __('RadialBar') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-scatter']) }}">{{ __('Scatter') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-polar-area']) }}">{{ __('Polar Area') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'apex-sparklines']) }}">{{ __('Sparklines') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarChartJSCharts" aria-expanded="false" aria-controls="sidebarChartJSCharts">
                                <span>{{ __('ChartJS') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarChartJSCharts">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ route('second', ['charts', 'chartjs-area']) }}">{{ __('Area') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'chartjs-bar']) }}">{{ __('Bar') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'chartjs-line']) }}">{{ __('Line') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('second', ['charts', 'chartjs-other']) }}">{{ __('Other') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('second', ['charts', 'brite']) }}">{{ __('Britecharts') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['charts', 'sparkline']) }}">{{ __('Sparklines') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
                    <i class="uil-document-layout-center"></i>
                    <span>{{ __('Forms') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarForms">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['forms', 'elements']) }}">{{ __('Basic Elements') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['forms', 'advanced']) }}">{{ __('Form Advanced') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['forms', 'validation']) }}">{{ __('Validation') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['forms', 'wizard']) }}">{{ __('Wizard') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['forms', 'fileuploads']) }}">{{ __('File Uploads') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['forms', 'editors']) }}">{{ __('Editors') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
                    <i class="uil-table"></i>
                    <span>{{ __('Tables') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarTables">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['tables', 'basic']) }}">{{ __('Basic Tables') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['tables', 'datatable']) }}">{{ __('Data Tables') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps" class="side-nav-link">
                    <i class="uil-location-point"></i>
                    <span>{{ __('Maps') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('second', ['maps', 'google']) }}">{{ __('Google Maps') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('second', ['maps', 'vector']) }}">{{ __('Vector Maps') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">
                    <i class="uil-folder-plus"></i>
                    <span>{{ __('Multi Level') }}</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMultiLevel">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel">
                                <span>{{ __('Second Level') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSecondLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="javascript: void(0);">{{ __('Item 1') }}</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">{{ __('Item 2') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel">
                                <span>{{ __('Third Level') }}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="javascript: void(0);">{{ __('Item 1') }}</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false" aria-controls="sidebarFourthLevel">
                                            <span>{{ __('Item 2') }}</span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarFourthLevel">
                                            <ul class="side-nav-forth-level">
                                                <li>
                                                    <a href="javascript: void(0);">{{ __('Item 2.1') }}</a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);">{{ __('Item 2.2') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>-->

           

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->