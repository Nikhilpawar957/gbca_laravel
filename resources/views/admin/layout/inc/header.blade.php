<header class="navbar navbar-expand-md navbar-transparent d-none d-lg-flex d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
                <a href="{{ Request::fullUrlWithQuery(['theme' => 'dark']) }}" class="nav-link px-0 hide-theme-dark"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable dark mode"
                    data-bs-original-title="Enable dark mode">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon-filled"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 1.992a10 10 0 1 0 9.236 13.838c.341 -.82 -.476 -1.644 -1.298 -1.31a6.5 6.5 0 0 1 -6.864 -10.787l.077 -.08c.551 -.63 .113 -1.653 -.758 -1.653h-.266l-.068 -.006l-.06 -.002z"
                            stroke-width="0" fill="currentColor" />
                    </svg>
                </a>&nbsp;
                <a href="{{ Request::fullUrlWithQuery(['theme' => 'light']) }}" class="nav-link px-0 hide-theme-light"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Enable light mode"
                    data-bs-original-title="Enable light mode">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun-filled"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 19a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"
                            stroke-width="0" fill="currentColor" />
                        <path
                            d="M18.313 16.91l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 1.218 -1.567l.102 .07z"
                            stroke-width="0" fill="currentColor" />
                        <path
                            d="M7.007 16.993a1 1 0 0 1 .083 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7a1 1 0 0 1 1.414 0z"
                            stroke-width="0" fill="currentColor" />
                        <path d="M4 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"
                            stroke-width="0" fill="currentColor" />
                        <path d="M21 11a1 1 0 0 1 .117 1.993l-.117 .007h-1a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"
                            stroke-width="0" fill="currentColor" />
                        <path
                            d="M6.213 4.81l.094 .083l.7 .7a1 1 0 0 1 -1.32 1.497l-.094 -.083l-.7 -.7a1 1 0 0 1 1.217 -1.567l.102 .07z"
                            stroke-width="0" fill="currentColor" />
                        <path
                            d="M19.107 4.893a1 1 0 0 1 .083 1.32l-.083 .094l-.7 .7a1 1 0 0 1 -1.497 -1.32l.083 -.094l.7 -.7a1 1 0 0 1 1.414 0z"
                            stroke-width="0" fill="currentColor" />
                        <path
                            d="M12 2a1 1 0 0 1 .993 .883l.007 .117v1a1 1 0 0 1 -1.993 .117l-.007 -.117v-1a1 1 0 0 1 1 -1z"
                            stroke-width="0" fill="currentColor" />
                        <path d="M12 7a5 5 0 1 1 -4.995 5.217l-.005 -.217l.005 -.217a5 5 0 0 1 4.995 -4.783z"
                            stroke-width="0" fill="currentColor" />
                    </svg>
                </a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm rounded-pill border border-dark"
                        style="background-image: url({{ asset('admin/static/avatars/user.png') }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>Admin</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('author.settings') }}" class="dropdown-item">Settings</a>
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#logout-modal"
                        class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div>
            </div>
        </div>
    </div>
</header>

<div class="modal modal-blur fade" id="logout-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon mb-2 text-danger icon-lg icon-tabler icon-tabler-logout" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                    <path d="M9 12h12l-3 -3" />
                    <path d="M18 15l3 -3" />
                </svg>
                <h3>Logout</h3>
                <div class="text-muted">
                    Do you really want to logout?
                </div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <a href="javascript:void(0);"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="btn btn-danger w-100">
                                Yes
                            </a>
                            <form id="logout-form" action="{{ route('author.logout') }}" method="post">
                                @csrf
                            </form>
                        </div>
                        <div class="col">
                            <a href="javascript:void(0);" class="btn w-100" data-bs-dismiss="modal">
                                No
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
