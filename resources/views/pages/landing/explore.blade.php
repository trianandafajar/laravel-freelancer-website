@extends('layouts.front')

@section('title', 'Explore')

@section('content')

<div class="content">
    <!-- Services -->
    <div class="bg-serv-bg-explore overflow-hidden">
        <div class="pt-16 pb-16 lg:pb-20 lg:px-24 md:px-16 sm:px-8 px-8 mx-auto">
            <div class="text-center">
                <h1 class="text-3xl font-semibold mb-1">Service Overviews</h1>
                <p class="leading-8 text-serv-text mb-10">
                    Discover the world's top Freelancers
                </p>
            </div>

            <!-- Categories (optional: bisa dibuat dinamis) -->
            <nav class="my-8 text-center" aria-label="navigation">
                <a class="bg-serv-bg text-white block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
                    All Services
                </a>
                <a class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
                    Programming & Tech
                </a>
                <a class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
                    Graphic Design
                </a>
                <a class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
                    Digital Marketing
                </a>
                <a class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
                    Business
                </a>
            </nav>

            <!-- Services Grid -->
            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6">
                @forelse ($services as $item)
                    @include('components.landing.service-explore', ['service' => $item])
                @empty
                    <div class="col-span-3 text-center py-12">
                        <h3 class="text-xl font-semibold text-gray-600">No services found</h3>
                        <p class="text-gray-400 mt-2">Try exploring different categories.</p>
                    </div>
                @endforelse
            </div>

            <!-- Load More -->
            <div class="text-center mt-10">
                <a href="{{ route('explore.load-more') }}" class="bg-serv-explore-button text-serv-bg block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl">
                    Load More
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
