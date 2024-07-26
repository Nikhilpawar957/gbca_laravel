<header class="header-area header-sticky background-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="{{ route('index') }}" class="logo"> <img src="{{ \App\Models\Setting::find(1)->logo }}"
                            class="img-fluid logo-img">
                    </a>
                    <ul class="nav">
                        <li class="{{ request()->is('about-us') ? 'active-class active' : '' }}"><a
                                href="{{ route('about-us') }}">About Us </a></li>
                        <li class="has-sub "> <a href="javascript:void(0)">Services <img
                                    src="{{ asset('assets/img/plus-icon.svg') }}" class=" menu-plus"></a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('services.transaction-and-business-structuring') }}">Transaction
                                        and Business Structuring</a></li>
                                <li><a href="{{ route('services.audit-and-assurance') }}">Audit and Assurance</a></li>
                                <li><a href="{{ route('services.direct-tax') }}">Direct Tax</a></li>
                                <li><a href="{{ route('services.corporate-and-regulatory-laws') }}">Corporate and
                                        Regulatory Laws</a></li>
                                <li><a href="{{ route('services.indirect-tax') }}">Indirect Tax</a></li>
                                <li><a href="{{ route('services.fema-and-international-taxation') }}">FEMA and
                                        International Taxation</a></li>
                                <li><a href="{{ route('services.safe') }}">SAFE</a></li>
                                <li><a href="{{ route('services.doing-business-in-india') }}" class="last-item">Doing
                                        Business in India</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ request()->is('industries') ? 'active-class active' : '' }}">
                            <a href="{{ route('industries') }}">Industries</a>
                        </li>
                        <li class="has-sub">
                            <a href="javascript:void(0);">Resources
                                <img src="{{ asset('assets/img/plus-icon.svg') }}" class="menu-plus">
                            </a>
                            <ul class="sub-menu">
                                @php
                                    $parent_count = \App\Models\Category::whereNull('parent_category')->count();
                                @endphp
                                @foreach (\App\Models\Category::whereNull('parent_category')->orderBy('ordering')->get() as $key => $category)
                                    @php
                                        $subcategories = DB::table('categories')
                                            ->where('parent_category', '=', $category->id)
                                            ->orderBy('ordering')
                                            ->whereNull('deleted_at')
                                            ->get();
                                        if ($subcategories->isNotEmpty()) {
                                            $hasSubcat = 'has-sub news-has-menu';
                                        } else {
                                            $hasSubcat = '';
                                        }

                                        $subcat_count = DB::table('categories')->where('parent_category', '=', $category->id)->whereNull('deleted_at')->count();
                                    @endphp
                                    <li class="{{ $hasSubcat }}">
                                        <a class="{{ $key == $parent_count-1 ? 'last-item' : '' }}" href="{{ route('resources.resource_category', ['category' => $category->category_slug]) }}"
                                            class="">
                                            {{ $category->category_name }}
                                        </a>
                                        @if ($subcategories->isNotEmpty())
                                            <ul class="sub-menu news-submenu">
                                                @foreach ($subcategories as $skey => $subcategory)
                                                    <li>
                                                        <a class="{{ $skey == $subcat_count-1 ? 'last-item' : '' }}"
                                                            href="{{ route('resources.resource_category', ['category' => $subcategory->category_slug]) }}">
                                                            {{ $subcategory->category_name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="{{ request()->is('careers') ? 'active-class active' : '' }}"><a
                                href="{{ route('careers') }}">Careers</a></li>
                        <li class="{{ request()->is('contact-us') ? 'active-class active' : '' }}"><a
                                href="{{ route('contact-us') }}">Contact Us</a></li>
                        <li class="pad-diff has-sub">
                            @if (Auth::check())
                                <a href="javascript:void();" class="almn-login">{{ ucwords(auth()->user()->name) }}</a>
                                <ul class="sub-menu alumni-menu">
                                    <li><a href="{{ route('view-profile') }}">Profile</a></li>
                                    <li><a href="{{ route('alumni-directory') }}">View Alumni</a></li>
                                    <li><a href="javascript:void(0);"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="last-item">Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                                        @csrf
                                    </form>
                                </ul>
                            @else
                                <a href="{{ route('login') }}" class="almn-login">Alumni Login <img
                                        src="{{ asset('assets/img/plus-menu-orange.svg') }}" class=" menu-plus"></a>
                            @endif
                        </li>
                        <li class="global-btn">
                            <a href="https://www.gbcauae.com/" target="_blank" class="external-btn"><img
                                    src="{{ asset('assets/img/globe.png') }}" class="globe-icon">UAE Connect</a>
                        </li>
                    </ul>
                    <a class="menu-trigger"> <span>Menu</span> </a>
                </nav>
            </div>
        </div>
    </div>
</header>
