@extends('layouts.front')

@section('title', 'Detail')

@section('content')

<!-- Breadcrumb -->
<nav class="mx-8 mt-8 text-sm lg:mx-20" aria-label="Breadcrumb">
    <ol class="inline-flex p-0 list-none">
        <li class="flex items-center">
            <a href="#" class="text-gray-400">Programming & Tech</a>
            <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" viewBox="0 0 320 512">
                <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/>
            </svg>
        </li>
        <li class="flex items-center">
            <a href="#" class="font-medium">Website Developer</a>
        </li>
    </ol>
</nav>

<section class="px-4 pt-6 pb-20 mx-auto w-auth lg:mx-12">
    <div class="grid gap-5 md:grid-cols-12">
        <main class="p-4 lg:col-span-8 md:col-span-12">
            <!-- Title & Rating -->
            <h1 class="text-2xl font-semibold">{{ $service->title }}</h1>
            <div class="my-3">
                @include('components.landing.rating')
            </div>

            <!-- Image Gallery -->
            <div class="p-3 my-4 bg-gray-100 rounded-lg image-gallery" x-data="gallery()">
                <img :src="featured" class="rounded-lg cursor-pointer w-100" data-lity>
                <div class="flex overflow-x-scroll hide-scroll-bar dragscroll mt-2">
                    <div class="flex flex-nowrap">
                        @foreach ($thumbnail as $item)
                            <img 
                                :class="{ 'border-4 border-serv-button': active === {{ $item->id }} }" 
                                @click="changeThumbnail('{{ url(Storage::url($item->thumbnail)) }}', {{ $item->id }})" 
                                src="{{ url(Storage::url($item->thumbnail)) }}" 
                                class="inline-block mr-2 rounded-lg cursor-pointer h-20 w-36 object-cover"
                            >
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Tabs -->
            <div x-data="{ tab: window.location.hash ? window.location.hash.substring(1) : 'description' }" id="tab_wrapper">
                <nav class="my-8">
                    <a @click.prevent="tab = 'description'; window.location.hash = 'description'" href="#" 
                       class="inline-block px-8 py-2 my-2 mr-2 font-medium rounded-xl" 
                       :class="{ 'bg-serv-bg text-white': tab === 'description','bg-serv-services-bg text-serv-bg' : tab !== 'description' }">
                        Description
                    </a>
                    <a @click.prevent="tab = 'seller'; window.location.hash = 'seller'" href="#" 
                       class="inline-block px-8 py-2 my-2 mr-2 font-medium rounded-xl" 
                       :class="{ 'bg-serv-bg text-white': tab === 'seller','bg-serv-services-bg text-serv-bg' : tab !== 'seller' }">
                        About The Seller
                    </a>
                    <a @click.prevent="tab = 'reviews'; window.location.hash = 'reviews'" href="#" 
                       class="inline-block px-8 py-2 my-2 mr-2 font-medium rounded-xl" 
                       :class="{ 'bg-serv-bg text-white': tab === 'reviews','bg-serv-services-bg text-serv-bg' : tab !== 'reviews' }">
                        Reviews
                    </a>
                </nav>

                <!-- Tab Description -->
                <div x-show="tab === 'description'" class="leading-8 text-md">
                    <h2 class="text-xl font-semibold">About This <span class="text-serv-button">Service</span></h2>
                    <p class="mt-4 mb-8">{{ $service->description }}</p>

                    <h3 class="my-4 text-lg font-semibold">Why choose my Service?</h3>
                    <ul class="mb-4 list-check">
                        @foreach ($advantage_service as $item)
                            <li class="pl-10 my-2">{{ $item->advantage }}</li>
                        @endforeach
                    </ul>

                    <p class="mb-4">{{ $service->note }}</p>
                    <p class="mb-4 font-medium">Contact me to get started!</p>
                </div>

                <!-- Tab Seller -->
                <div x-show="tab === 'seller'" class="leading-8 text-md">
                    <h2 class="mb-4 text-xl font-semibold">About <span class="text-serv-button">Me</span></h2>

                    <div class="grid md:grid-cols-12 gap-4">
                        <div class="flex items-center col-span-12 p-2 lg:col-span-6">
                            <div class="flex items-center space-x-4">
                                @if ($service->user->detail_user->photo)
                                    <img class="w-20 h-20 object-cover rounded-full" src="{{ url(Storage::url($service->user->detail_user->photo)) }}">
                                @else
                                    <svg class="w-20 h-20 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M24..."/></svg>
                                @endif
                            </div>
                            <div class="flex-grow p-4 leading-8">
                                <div class="text-lg font-semibold text-gray-700">{{ $service->user->name }}</div>
                                <div class="text-gray-400">Bandung, Indonesia</div>
                            </div>
                        </div>

                        <div class="items-center col-span-12 lg:col-span-6">
                            <div class="text-right lg:my-6 ml-24 -mt-10">
                                @include('components.landing.rating')
                            </div>
                        </div>
                    </div>

                    <h3 class="my-4 text-lg font-semibold">Biography</h3>
                    <p class="mt-4 mb-8">{{ $service->user->detail_user->biography }}</p>

                    <h3 class="my-4 text-lg font-semibold">My Experiences</h3>
                    <ul class="mb-8 list-check">
                        @foreach ($advantage_user as $item)
                            <li class="pl-10 my-2">{{ $item->advantage }}</li>
                        @endforeach
                    </ul>

                    <h3 class="my-4 text-lg font-semibold">Skills</h3>
                    <ul class="mb-8 list-check">
                        @foreach ($tagline as $item)
                            <li class="pl-10 my-2">{{ $item->tagline }}</li>
                        @endforeach
                    </ul>

                    <hr class="border-serv-services-bg">
                    <p class="my-4 text-lg text-gray-400">
                        Joined Since {{ date('d F Y', strtotime($service->created_at)) }}
                    </p>
                </div>

                <!-- Tab Reviews -->
                <div x-show="tab === 'reviews'">
                    <h2 class="mb-4 text-xl font-semibold"><span class="text-serv-button">210</span> Happy Clients</h2>
                    @include('components.landing.review')
                    @include('components.landing.review')
                    @include('components.landing.review')
                </div>
            </div>
        </main>

        <!-- Sidebar -->
        <aside class="p-4 lg:col-span-4 md:col-span-12">
            <div class="mb-4 border rounded-lg border-serv-testimonial-border">
                <div class="flex items-start px-4 pt-6">
                    @if ($service->user->detail_user->photo)
                        <img class="object-cover w-16 h-16 mr-4 rounded-full" src="{{ url(Storage::url($service->user->detail_user->photo)) }}">
                    @else
                        <svg class="object-cover w-16 h-16 mr-4 rounded-full text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M24..."/></svg>
                    @endif
                    <div>
                        <h2 class="text-xl font-medium text-serv-bg">{{ $service->user->name }}</h2>
                        <p class="text-md text-serv-text">{{ $service->user->detail_user->role }}</p>
                    </div>
                </div>

                <div class="flex items-center px-2 py-3 mx-4 mt-4 border rounded-full border-serv-testimonial-border text-sm text-center font-medium">
                    <div class="flex-1">
                        <svg class="inline" width="24" height="24"><circle cx="12" cy="12" r="8" stroke="#082431" stroke-width="1.5" /><path d="M12 7V12L15 13.5" stroke="#082431" stroke-width="1.5" /></svg>
                        {{ $service->delivery_time }} Days Delivery
                    </div>
                    <div class="flex-1">
                        <svg class="inline" width="24" height="24"><path d="..." /></svg>
                        {{ $service->revision_limit }} Revisions
                    </div>
                </div>

                <ul class="px-4 pt-4 pb-2 mb-4 text-sm list-check">
                    @foreach ($thumbnail as $index => $item)
                        <li class="pl-10 my-4">{{ $index + 1 }} Page{{ $index != 0 ? 's' : '' }}</li>
                    @endforeach
                </ul>

                <table class="w-full px-4">
                    <tr>
                        <td class="text-sm leading-7 text-serv-text">Price starts from:</td>
                        <td class="text-xl font-semibold text-right text-serv-button">Rp. {{ number_format($service->price, 0, ',', '.') }}</td>
                    </tr>
                </table>

                <div class="px-4 pb-4">
                    @auth
                        <a href="{{ route('booking.landing', $service->id) }}" class="block px-12 py-4 my-2 text-lg font-semibold text-center text-white bg-serv-button rounded-xl">Booking Now</a>
                    @endauth
                    @guest
                        <a onclick="toggleModal('loginModal')" class="block px-12 py-4 my-2 text-lg font-semibold text-center text-white bg-serv-button rounded-xl">Booking Now</a>
                    @endguest
                </div>
            </div>
        </aside>
    </div>
</section>

@endsection

@push('after-script')
<script>
    function gallery() {
        return {
            featured: '{{ count($thumbnail) ? url(Storage::url($thumbnail[0]->thumbnail)) : "https://via.placeholder.com/800x400" }}',
            active: {{ count($thumbnail) ? $thumbnail[0]->id : 0 }},
            changeThumbnail(url, id) {
                this.featured = url;
                this.active = id;
            }
        }
    }
</script>
@endpush
