<header class="header-area header-sticky background-header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="index.php" class="logo"> <img src="{{ asset('assets/img/gbc-llp-logo.png') }}"
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
                                <li class="">
                                    <a href="resources.php?cat_name=audit-and-assurance" class="">
                                        Audit and Assurance
                                    </a>
                                </li>
                                <li class="">
                                    <a href="resources.php?cat_name=transaction-and-business-structuring"
                                        class="">
                                        Transaction and Business Structuring
                                    </a>
                                </li>
                                <li class="">
                                    <a href="resources.php?cat_name=direct-tax" class="">
                                        Direct Tax
                                    </a>
                                </li>
                                <li class="">
                                    <a href="resources.php?cat_name=indirect-tax" class="">
                                        Indirect Tax
                                    </a>
                                </li>
                                <li class="">
                                    <a href="resources.php?cat_name=corporate-and-other-regulatory-laws" class="">
                                        Corporate &amp; Other Regulatory Laws
                                    </a>
                                </li>
                                <li class="has-sub news-has-menu">
                                    <a href="javascript:void(0);" class="last-item">
                                        Newsletter
                                    </a>
                                    <ul class="sub-menu news-submenu">
                                        <li>
                                            <a href="resources.php?cat_name=gbca-crossborder-insights">GBCA Crossborder
                                                Insights
                                            </a>
                                        </li>
                                        <li>
                                            <a href="resources.php?cat_name=monthly">Monthly</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ request()->is('careers') ? 'active-class active' : '' }}"><a
                                href="{{ route('careers') }}">Careers</a></li>
                        <li class="{{ request()->is('contact-us') ? 'active-class active' : '' }}"><a
                                href="{{ route('contact-us') }}">Contact Us</a></li>
                        <li class="pad-diff has-sub"> </li>
                        <li> <a href="alumni-login.php" class="almn-login">Alumni Login <img
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
