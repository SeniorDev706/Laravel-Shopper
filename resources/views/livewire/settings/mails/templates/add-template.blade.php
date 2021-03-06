<div x-data="{ currentTab: 'html'}">
    <x:shopper-breadcrumb back="shopper.settings.users">
        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
        </svg>
        <a href="{{ route('shopper.settings.mails') }}" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:underline transition duration-150 ease-in-out">{{ __('Email configuration') }}</a>
    </x:shopper-breadcrumb>

    <div class="mt-3 border-b border-gray-200">
        <div class="sm:flex sm:items-baseline">
            <h3 class="text-xl leading-6 font-bold text-gray-900 sm:text-2xl">
                {{ __('Add template') }}
            </h3>
            <div class="mt-4 sm:mt-0 sm:ml-10">
                <nav class="-mb-px flex space-x-8">
                    <button @click="currentTab = 'html'" type="button" class="whitespace-no-wrap pb-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300" aria-current="page" :class="{ 'border-blue-500 text-blue-600 focus:text-blue-800 focus:border-blue-700': currentTab === 'html' }">
                        HTML
                    </button>

                    <button @click="currentTab = 'markdown'" type="button" class="whitespace-no-wrap pb-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300" aria-current="page" :class="{ 'border-blue-500 text-blue-600 focus:text-blue-800 focus:border-blue-700': currentTab === 'markdown' }">
                        Markdown
                    </button>
                </nav>
            </div>
        </div>
    </div>

    <div class="mt-6 pb-10">
        <div x-show="currentTab === 'html'" class="grid grid-cols-1 gap-y-8 sm:grid-cols-2 sm:gap-x-5 sm:gap-y-6 md:grid-cols-3 lg:col-span-3">
            @foreach($skeletons->get('html') as $name => $subskeletons)
                <button wire:click="loadSubSkeletons('{{ $name }}', {{ json_encode($subskeletons) }})" type="button" class="block overflow-hidden group text-left">
                    <figure>
                        <div class="relative rounded overflow-hidden transition transform duration-150 ease-in-out">
                            @if (file_exists(public_path("shopper/images/skeletons/html/{$name}.png")))
                                <img class="w-full h-44 object-top object-cover" src="{{ asset('shopper/images/skeletons/html/'.$name.'.png' ) }}" alt="{{ $name }}">
                            @elseif(file_exists(public_path( "shopper/images/skeletons/html/{$name}.jpg")))
                                <img class="w-full h-44 object-top object-cover" src="{{ asset('shopper/images/skeletons/html/'.$name.'.jpg' ) }}" alt="{{ $name }}">
                            @else
                                <img class="w-full h-44 object-top object-cover" src="{{ asset('shopper/images/skeletons/no-image.png' ) }}" alt="{{ $name }}">
                            @endif
                            <div class="absolute inset-0 flex items-center justify-center text-center rounded-md border-gray-900 opacity-15 border"></div>
                            <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 transition ease-in-out duration-150"></div>
                        </div>
                        <figcaption class="mt-3">
                            <p class="flex items-baseline text-sm font-medium text-gray-900 capitalize">
                                <span> {{ $name }}</span>
                            </p>
                        </figcaption>
                    </figure>
                </button>
            @endforeach
        </div>
        <div x-cloak x-show="currentTab === 'markdown'" class="grid grid-cols-1 gap-y-8 sm:grid-cols-2 sm:gap-x-5 sm:gap-y-6 md:grid-cols-3 lg:col-span-3">
            @foreach($skeletons->get('markdown') as $name => $subskeletons)
                <button wire:click="loadSubSkeletons('{{ $name }}', {{ json_encode($subskeletons) }})" type="button" class="block group text-left">
                    <figure>
                        <div class="relative rounded overflow-hidden transition transform duration-150 ease-in-out">
                            @if (file_exists(public_path("shopper/images/skeletons/markdown/{$name}.png")))
                                <img class="w-full h-44 object-top object-cover" src="{{ asset('shopper/images/skeletons/markdown/'.$name.'.png' ) }}" alt="{{ $name }}">
                            @elseif(file_exists(public_path( "shopper/images/skeletons/markdown/{$name}.jpg")))
                                <img class="w-full h-44 object-top object-cover" src="{{ asset('shopper/images/skeletons/markdown/'.$name.'.jpg' ) }}" alt="{{ $name }}">
                            @else
                                <img class="w-full h-44 object-top object-cover" src="{{ asset('shopper/images/skeletons/no-image.png' ) }}" alt="{{ $name }}">
                            @endif
                            <div class="absolute inset-0 flex items-center justify-center text-center rounded-md border-gray-900 opacity-15 border"></div>
                            <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 transition ease-in-out duration-150"></div>
                        </div>
                        <figcaption class="mt-3">
                            <p class="flex items-baseline text-sm font-medium text-gray-900 capitalize">
                                <span> {{ $name }}</span>
                            </p>
                        </figcaption>
                    </figure>
                </button>
            @endforeach
        </div>
    </div>

    <x-shopper-modal wire:model="skeletonDisplayModal" maxWidth="lg" id="skeletons">
        <div class="bg-white">
            <div class="sm:flex sm:items-start px-4 sm:px-6 py-4">
                <div class="text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 capitalize">
                        {{ $currentSkeleton }}
                    </h3>
                </div>
            </div>
            <div class="p-4 sm:px-6 border-t border-gray-100">
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    @foreach($subSkeletons as $skeleton)
                        <div class="relative rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm flex items-center hover:border-gray-400">
                            <div class="flex-1 min-w-0">
                                <a href="{{ route('shopper.settings.mails.create-template', ['type' => 'html', 'name' => $currentSkeleton, 'skeleton' => $skeleton]) }}" class="focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900 capitalize">
                                        {{ $skeleton }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                <x-shopper-default-button wire:click="closeModal" type="button">
                    {{ __('Cancel') }}
                </x-shopper-default-button>
            </span>
        </div>
    </x-shopper-modal>
</div>
