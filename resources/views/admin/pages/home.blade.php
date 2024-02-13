@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard | ' . env('APP_NAME'))
@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Overview
                    </div>
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-sm-6 col-lg-4">
                    <div class="card card-sm">
                        <div class="card-body">
                            <h3 class="card-title">Alumnis</h3>
                            @php
                                $pending_count = \App\Models\User::where('role', '=', 2)->where('blocked', '=', 2)->count();
                                $rejected_count = \App\Models\User::where('role', '=', 2)->where('blocked', '=', 1)->count();
                                $approved_count = \App\Models\User::where('role', '=', 2)->where('blocked', '=', 0)->count();
                            @endphp
                            <div id="chart-demo-pie" class="chart-lg"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-8">
                    <div class="row row-cards">
                        <div class="col-md-6">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-primary text-white avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-category-filled" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M10 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z"
                                                        stroke-width="0" fill="currentColor" />
                                                    <path
                                                        d="M20 3h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z"
                                                        stroke-width="0" fill="currentColor" />
                                                    <path
                                                        d="M10 13h-6a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1 -1v-6a1 1 0 0 0 -1 -1z"
                                                        stroke-width="0" fill="currentColor" />
                                                    <path
                                                        d="M17 13a4 4 0 1 1 -3.995 4.2l-.005 -.2l.005 -.2a4 4 0 0 1 3.995 -3.8z"
                                                        stroke-width="0" fill="currentColor" />
                                                </svg>

                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ \App\Models\Category::count() }} Categories
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span
                                                class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                                    <path d="M7 8h10" />
                                                    <path d="M7 12h10" />
                                                    <path d="M7 16h10" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ \App\Models\Resources::count() }} Resources
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-blue text-white avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-forms"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 3a3 3 0 0 0 -3 3v12a3 3 0 0 0 3 3" />
                                                    <path d="M6 3a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3" />
                                                    <path d="M13 7h7a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-7" />
                                                    <path d="M5 7h-1a1 1 0 0 0 -1 1v8a1 1 0 0 0 1 1h1" />
                                                    <path d="M17 12h.01" />
                                                    <path d="M13 12h.01" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ \App\Models\ContactForm::count() }}
                                                Contact Form Enquiries
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-indigo text-white avatar">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-forms"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M12 3a3 3 0 0 0 -3 3v12a3 3 0 0 0 3 3" />
                                                    <path d="M6 3a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3" />
                                                    <path d="M13 7h7a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-7" />
                                                    <path d="M5 7h-1a1 1 0 0 0 -1 1v8a1 1 0 0 0 1 1h1" />
                                                    <path d="M17 12h.01" />
                                                    <path d="M13 12h.01" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                {{ DB::table('profile_form')->count() }}
                                                Profile Form Enquiries
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script src="/admin/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>

    <script>
        // @formatter:off
        document.addEventListener("DOMContentLoaded", function() {
            window.ApexCharts &&
                new ApexCharts(document.getElementById("chart-demo-pie"), {
                    chart: {
                        type: "donut",
                        fontFamily: "inherit",
                        height: 240,
                        sparkline: {
                            enabled: true,
                        },
                        animations: {
                            enabled: false,
                        },
                    },
                    fill: {
                        opacity: 1,
                    },
                    series: [{{ $pending_count }}, {{ $rejected_count }}, {{ $approved_count }}],
                    labels: ["Pending", "Rejected", "Approved"],
                    tooltip: {
                        theme: "dark",
                    },
                    grid: {
                        strokeDashArray: 4,
                    },
                    colors: [
                        tabler.getColor("blue"),
                        tabler.getColor("red"),
                        tabler.getColor("green"),
                    ],
                    legend: {
                        show: true,
                        position: "bottom",
                        offsetY: 12,
                        markers: {
                            width: 10,
                            height: 10,
                            radius: 100,
                        },
                        itemMargin: {
                            horizontal: 8,
                            vertical: 8,
                        },
                    },
                    tooltip: {
                        fillSeriesColor: false,
                    },
                }).render();
        });
        // @formatter:on
    </script>
@endpush
