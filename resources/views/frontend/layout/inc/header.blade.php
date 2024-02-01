<header class="header-area header-sticky background-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="{{ route('index') }}" class="logo"> <img src="{{ asset('assets/img/gbc-llp-logo.png') }}"
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
                                @foreach (\App\Models\Category::whereNull('parent_category')->orderBy('ordering')->get() as $category)
                                    @php
                                        $subcategories = DB::table('categories')
                                            ->where('parent_category', '=', $category->id)
                                            ->orderBy('ordering')
                                            ->get();
                                        if ($subcategories->isNotEmpty()) {
                                            $hasSubcat = 'has-sub news-has-menu';
                                        } else {
                                            $hasSubcat = '';
                                        }
                                    @endphp
                                    <li class="{{ $hasSubcat }}">
                                        <a href="{{ route('resources.resource_category', ['category' => $category->category_slug]) }}"
                                            class="">
                                            {{ $category->category_name }}
                                        </a>
                                        @if ($subcategories->isNotEmpty())
                                            <ul class="sub-menu news-submenu">

                                                @foreach ($subcategories as $key => $subcategory)
                                                    <li>
                                                        <a
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
                        <li class="pad-diff has-sub"> </li>
                        <li> <a href="{{ route('alumni-login') }}" class="almn-login">Alumni Login <img
                                    src="{{ asset('assets/img/plus-menu-orange.svg') }}" class=" menu-plus"></a> </li>
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
