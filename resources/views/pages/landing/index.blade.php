@extends('layouts.front')

@section('title', 'Home')

@section('content')

{{-- Top Hero Section --}}
<div class="hero-bg">
    <div class="hero">
        <div class="mx-auto flex pt-16 pb-16 lg:pb-20 lg:px-24 md:px-16 sm:px-8 px-8 lg:flex-row flex-col">
            <!-- Left -->
            <div class="lg:flex-grow lg:w-1/2 flex flex-col lg:items-start lg:text-left mb-3 md:mb-12 lg:mb-0 items-center text-center">
                <h1 class="text-black-1 lg:leading-normal sm:text-4xl lg:text-5xl text-3xl mb-5 font-semibold lg:mt-20">
                    Finish Your Project With <br class="lg:block hidden"> Ours Best Freelancers
                </h1>
                <p class="text-lg leading-relaxed text-serv-text font-light tracking-wide mb-10 lg:mb-18">
                    Find thousands of remote workers who have the best <br class="lg:block hidden">
                    skills and experience to help you accomplishing <br class="lg:block hidden">
                    your projects.
                </p>
                <div class="md:flex contents items-center mx-auto lg:mx-0 lg:flex justify-center lg:space-x-8 md:space-x-2 space-x-0">
                    <button class="bg-serv-button text-white text-lg font-semibold py-4 px-12 my-2 rounded-lg"
                        onclick="toggleModal('registerModal')">
                        Get Started
                    </button>
                </div>
            </div>
            <!-- Right -->
            <div class="w-full lg:w-1/2 text-center flex justify-center pr-0">
                <img class="w-75" src="{{ asset('/assets/hero-image.png') }}" alt="Hero Image" />
            </div>
        </div>

        <!-- Brand Logos -->
        <div class="lg:mb-20 mb-10 flex sm:space-x-4 space-x-1">
            @foreach (['netflix', 'amazon', 'uber', 'grab', 'google'] as $brand)
                <div class="flex-1 flex items-center justify-center py-3 px-6">
                    <img src="{{ url("images/brand-logo/{$brand}.svg") }}" alt="{{ $brand }}">
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Main Content --}}
<div class="content">

    <!-- Featured Services -->
    <div class="bg-serv-services-bg overflow-hidden">
        <div class="pt-16 pb-16 lg:pb-20 lg:pl-24 md:pl-16 sm:pl-8 pl-8 mx-auto">
            <div class="flex flex-col w-full">
                <h2 class="sm:text-2xl text-xl tracking-wider font-semibold mb-5 text-medium-black">
                    Featured Services
                </h2>
            </div>

            <div class="flex overflow-x-scroll pb-10 hide-scroll-bar dragscroll -mx-3">
                <div class="flex flex-nowrap">
                    @forelse ($services as $item)
                        @include('components.landing.service', ['service' => $item])
                    @empty
                        <div class="text-center text-gray-500 p-4">
                            No services available at the moment.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="py-10 lg:py-24 flex lg:flex-row flex-col items-center cta-bg">
        <!-- Left -->
        <div class="w-full lg:w-1/2 text-center flex justify-center lg:mb-0 mb-12">
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" data-lity>
                <img src="{{ asset('/assets/images/video-placeholder.png') }}" alt="Video" class="p-5" />
            </a>
        </div>
        <!-- Right -->
        <div class="lg:w-1/2 w-full flex flex-col lg:items-start items-center lg:text-left text-center">
            <h2 class="md:text-4xl text-3xl font-semibold mb-10 lg:leading-normal text-medium-black">
                Increase Productivity. <br> Save Your Time & Budget.
            </h2>
            <p class="text-lg leading-relaxed text-serv-text font-light mb-10 lg:mb-18">
                Find thousands of skilled and experienced <br class="lg:block hidden">
                remote workers to help you accomplishing <br class="lg:block hidden">
                your projects.
            </p>
            <a href="{{ route('explore') }}"
                class="bg-serv-button px-10 py-4 text-base text-white font-semibold rounded-xl tracking-wide">
                Learn More
            </a>
        </div>
    </div>

</div>

@endsection
