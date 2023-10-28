<?php
$currentUrl = \Request::segment(3);
?>

@extends('admin::layouts.master')

@section('navigation')
    <nav class="fixed z-30 w-full bg-white border-b-2 shadow-md">
        <div class="px-6 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button class="p-2 text-gray-600 rounded cursor-pointer lg:hidden" onclick="toogleNav()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <a href="#" class="flex items-center text-xl font-bold">
                        <img src="{{ url('/images/logo.svg') }}" alt="logo" class="h-8">
                    </a>

                </div>
                <div class="flex items-center">
                    <div class="relative inline-block ">
                        <!-- Logout button -->
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button class="relative flex items-center p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path
                                        d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2a9.985 9.985 0 0 1 8 4h-2.71a8 8 0 1 0 .001 12h2.71A9.985 9.985 0 0 1 12 22zm7-6v-3h-8v-2h8V8l5 4-5 4z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="pt-12 lg:flex">
        <div
            class="flex flex-col w-full px-4 py-8 overflow-y-auto border-b lg:border-r border-r-slate-300 lg:min-h-[100vh] lg:h-100 lg:w-64">
            <div class="hidden lg:flex flex-col justify-between mt-6" id="mobile-menu">
                <aside>
                    <ul>
                        <li>
                            <a class="flex items-center px-4 py-2 text-gray-600 rounded-lg {{ $currentUrl == 'dashboard' ? 'bg-white shadow-md' : 'bg-gray-200' }}"
                                href="{{ route('admin.dashboard') }}">
                                <i class="ri-home-4-line text-2xl"></i>
                                <span class="mx-4 font-medium">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
        <div class="w-full h-full p-4 sm:p-12 overflow-y-auto">
            @include('admin::layouts.flash-message')

            @yield('content')
        </div>
    </div>
@endsection
