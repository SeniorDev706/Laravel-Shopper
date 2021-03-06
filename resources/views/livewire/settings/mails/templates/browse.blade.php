<div class="min-w-0 flex-1 h-full flex flex-col overflow-hidden">
    <div class="flex-shrink-0 bg-white border-b border-blue-200">
        <div class="bg-blue-50 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3 flex-1 md:flex md:justify-between">
                    <p class="text-sm text-blue-700">
                        {{ __("If your project uses git don't forget to add the created files and commit them.") }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="min-h-0 flex-1 overflow-y-auto">
        <div class="p-6 sm:px-8 pb-10">
            <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{ __('Templates') }}
                </h3>
                @if($isLocal)
                    <div class="mt-3 sm:mt-0 sm:ml-4">
                        <x-shopper-link-button :href="route('shopper.settings.mails.select-template')" class="border border-transparent focus:border-blue-300 bg-blue-600 hover:bg-blue-500 text-white">
                            {{ __('Create new template') }}
                        </x-shopper-link-button>
                    </div>
                @endif
            </div>

            <div class="mt-6 flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Name') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Template') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            {{ __('Type') }}
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($templates->all() as $template)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ ucwords($template->template_name) }}
                                            </td>
                                            <td class="px-6 py-4 min-w-0 whitespace-nowrap text-sm text-gray-500">
                                                <span class="font-medium text-gray-700">{{ ucfirst($template->template_view_name) }}</span>
                                                ({{ ucfirst($template->template_skeleton) }})
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right capitalize text-sm text-gray-500">
                                                {{ $template->template_type }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="inline-flex items-center p-2 rounded-full hover:bg-gray-50 active:bg-gray-100 focus:bg-gray-100 text-gray-500 text-sm leading-5 hover:text-gray-400 focus:outline-none">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                                <button wire:click="openRemovedModal('{{ $template->template_name }}')" type="button" class="inline-flex items-center p-2 rounded-full hover:bg-gray-50 active:bg-gray-100 focus:bg-gray-100 text-gray-500 text-sm leading-5 hover:text-gray-400 focus:outline-none">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-3 text-right text-xs font-medium text-gray-500">
                                                <div class="py-10 flex flex-col items-center justify-center">
                                                    <svg class="currentColor w-20" viewBox="0 -1 385.27478 385" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="m71.558594 122.113281-62.46875-14.914062 19.019531-79.679688 62.472656 14.914063c9.503907 2.265625 15.367188 11.808594 13.101563 21.316406l-10.808594 45.265625c-2.269531 9.5-11.8125 15.367187-21.316406 13.097656zm0 0" fill="#d7e9ff" fill-rule="evenodd"></path>
                                                        <path d="m75.667969 129.425781c-1.882813 0-3.789063-.21875-5.6875-.671875-.007813 0-.007813 0-.007813 0l-62.472656-14.914062c-3.664062-.875-5.925781-4.554688-5.050781-8.222656l19.019531-79.683594c.417969-1.761719 1.519531-3.28125 3.066406-4.230469 1.53125-.949219 3.378906-1.25 5.160156-.824219l62.472657 14.914063c6.371093 1.519531 11.765625 5.433593 15.199219 11.011719 3.425781 5.582031 4.472656 12.160156 2.953124 18.53125l-10.808593 45.265624c-2.679688 11.238282-12.757813 18.824219-23.84375 18.824219zm-2.527344-13.953125c5.839844 1.386719 11.703125-2.21875 13.09375-8.042968l10.804687-45.269532c.675782-2.820312.214844-5.734375-1.308593-8.210937-1.519531-2.472657-3.910157-4.207031-6.738281-4.878907l-55.832032-13.328124-15.847656 66.402343 55.832031 13.332031h-.003906zm0 0" fill="#0e65e5"></path>
                                                        <path d="m81.097656 84.457031c-.527344 0-1.058594-.058593-1.59375-.1875-3.664062-.871093-5.925781-4.554687-5.050781-8.222656 1.382813-5.824219-2.222656-11.699219-8.046875-13.09375l-26-6.207031c-3.667969-.875-5.929688-4.554688-5.054688-8.226563.882813-3.664062 4.566407-5.917969 8.226563-5.050781l26 6.207031c13.144531 3.140625 21.285156 16.390625 18.152344 29.539063-.746094 3.136718-3.542969 5.242187-6.632813 5.242187zm0 0" fill="#fff"></path>
                                                        <path d="m282.15625 151.332031-188.632812-45.03125 9.511718-39.839843 188.632813 45.03125c9.503906 2.265624 15.371093 11.808593 13.101562 21.316406l-1.296875 5.421875c-2.269531 9.503906-11.8125 15.367187-21.316406 13.101562zm0 0" fill="#2a8ee6" fill-rule="evenodd"></path>
                                                        <path d="m286.3125 158.652344c-1.914062 0-3.832031-.226563-5.738281-.679688l-188.632813-45.03125c-3.667968-.878906-5.929687-4.558594-5.054687-8.222656l9.503906-39.839844c.421875-1.765625 1.523437-3.285156 3.070313-4.234375 1.53125-.949219 3.378906-1.246093 5.15625-.820312l188.632812 45.027343c6.367188 1.523438 11.769531 5.433594 15.199219 11.011719 3.429687 5.582031 4.476562 12.164063 2.953125 18.53125l-1.292969 5.421875c-1.519531 6.367188-5.425781 11.765625-11.003906 15.195313-3.910157 2.402343-8.320313 3.640625-12.792969 3.640625zm-184.558594-57.410156 181.992188 43.449218c2.8125.679688 5.734375.207032 8.207031-1.3125 2.472656-1.519531 4.207031-3.914062 4.878906-6.730468l1.296875-5.425782c.671875-2.824218.210938-5.742187-1.308594-8.214844-1.519531-2.46875-3.914062-4.203124-6.734374-4.875l-182-43.445312zm0 0" fill="#0e65e5"></path>
                                                        <path d="m307.300781 122.246094 39.84375 9.511718-6.34375 26.5625-39.839843-9.511718zm0 0" fill="#2a8ee6" fill-rule="evenodd"></path>
                                                        <path d="m340.792969 165.136719c-.527344 0-1.058594-.058594-1.585938-.183594l-39.84375-9.515625c-3.664062-.875-5.925781-4.554688-5.050781-8.226562l6.339844-26.558594c.871094-3.664063 4.574218-5.917969 8.226562-5.050782l39.839844 9.507813c3.664062.878906 5.925781 4.558594 5.054688 8.222656l-6.34375 26.5625c-.417969 1.761719-1.519532 3.285157-3.066407 4.234375-1.078125.664063-2.316406 1.007813-3.570312 1.007813zm-31.613281-21.390625 26.558593 6.339844 3.167969-13.28125-26.5625-6.339844zm0 0" fill="#0e65e5"></path>
                                                        <path d="m351.898438 111.835938 26.558593 6.339843-15.851562 66.40625-26.558594-6.34375zm0 0" fill="#d7e9ff" fill-rule="evenodd"></path>
                                                        <path d="m362.601562 191.398438c-.527343 0-1.0625-.0625-1.589843-.1875l-26.566407-6.339844c-1.757812-.421875-3.277343-1.523438-4.226562-3.066406-.953125-1.539063-1.246094-3.398438-.824219-5.160157l15.851563-66.402343c.875-3.667969 4.574218-5.914063 8.226562-5.054688l26.5625 6.339844c3.664063.878906 5.925782 4.558594 5.050782 8.222656l-15.84375 66.402344c-.421876 1.765625-1.523438 3.285156-3.066407 4.234375-1.082031.667969-2.324219 1.011719-3.574219 1.011719zm-18.339843-18.222657 13.285156 3.171875 12.671875-53.125-13.277344-3.167968zm0 0" fill="#0e65e5"></path>
                                                        <path d="m232.105469 143.496094c0 18.851562-15.28125 34.132812-34.132813 34.132812-18.851562 0-34.132812-15.28125-34.132812-34.132812 0-18.851563 15.28125-34.132813 34.132812-34.132813 18.851563 0 34.132813 15.28125 34.132813 34.132813zm0 0" fill="#94c1ff" fill-rule="evenodd"></path>
                                                        <g fill="#0e65e5">
                                                            <path d="m197.972656 184.457031c-22.585937 0-40.960937-18.375-40.960937-40.960937 0-22.585938 18.375-40.957032 40.960937-40.957032 22.585938 0 40.960938 18.371094 40.960938 40.957032 0 22.585937-18.375 40.960937-40.960938 40.960937zm0-68.265625c-15.058594 0-27.304687 12.25-27.304687 27.304688 0 15.058594 12.246093 27.308594 27.304687 27.308594s27.308594-12.25 27.308594-27.308594c0-15.054688-12.25-27.304688-27.308594-27.304688zm0 0"></path>
                                                            <path d="m62.308594 365.507812 109.164062-198 11.957032 6.59375-109.164063 198zm0 0"></path>
                                                            <path d="m205.300781 180.125 12.707031-4.992188 75.101563 191.15625-12.707031 4.992188zm0 0"></path>
                                                            <path d="m361.8125 361.949219c0-7.539063-79.464844-13.652344-177.492188-13.652344-98.027343 0-177.492187 6.113281-177.492187 13.652344 0 7.542969 79.464844 13.65625 177.492187 13.65625 98.027344 0 177.492188-6.113281 177.492188-13.65625zm0 0"></path>
                                                            <path d="m184.320312 382.429688c-47.582031 0-92.339843-1.425782-126.035156-4.019532-54.226562-4.167968-58.285156-9.226562-58.285156-16.460937s4.058594-12.289063 58.285156-16.460938c33.695313-2.59375 78.453125-4.015625 126.035156-4.015625 47.578126 0 92.339844 1.425782 126.035157 4.015625 54.222656 4.171875 58.285156 9.226563 58.285156 16.460938s-4.0625 12.292969-58.285156 16.460937c-33.695313 2.59375-78.457031 4.019532-126.035157 4.019532zm-153.367187-20.480469c27.066406 3.546875 80.601563 6.828125 153.363281 6.828125 72.765625 0 126.300782-3.28125 153.367188-6.828125-27.066406-3.546875-80.601563-6.824219-153.367188-6.824219-72.761718 0-126.296875 3.277344-153.363281 6.824219zm0 0"></path>
                                                            <path d="m61.441406 218.589844c-3.773437 0-6.828125-3.054688-6.828125-6.824219v-27.308594c0-3.769531 3.054688-6.828125 6.828125-6.828125 3.773438 0 6.824219 3.058594 6.824219 6.828125v27.308594c0 3.769531-3.050781 6.824219-6.824219 6.824219zm0 0"></path>
                                                            <path d="m75.09375 204.9375h-27.308594c-3.773437 0-6.824218-3.058594-6.824218-6.828125s3.050781-6.824219 6.824218-6.824219h27.308594c3.773438 0 6.828125 3.054688 6.828125 6.824219s-3.054687 6.828125-6.828125 6.828125zm0 0"></path>
                                                            <path d="m197.972656 307.335938c-3.773437 0-6.824218-3.054688-6.824218-6.824219v-27.308594c0-3.769531 3.050781-6.824219 6.824218-6.824219 3.773438 0 6.828125 3.054688 6.828125 6.824219v27.308594c0 3.769531-3.054687 6.824219-6.828125 6.824219zm0 0"></path>
                                                            <path d="m211.625 293.683594h-27.304688c-3.773437 0-6.828124-3.054688-6.828124-6.828125 0-3.769531 3.054687-6.824219 6.828124-6.824219h27.304688c3.773438 0 6.828125 3.054688 6.828125 6.824219 0 3.773437-3.054687 6.828125-6.828125 6.828125zm0 0"></path>
                                                            <path d="m307.199219 41.097656c-3.773438 0-6.824219-3.058594-6.824219-6.828125v-27.304687c0-3.769532 3.050781-6.828125 6.824219-6.828125 3.773437 0 6.828125 3.058593 6.828125 6.828125v27.304687c0 3.769531-3.054688 6.828125-6.828125 6.828125zm0 0"></path>
                                                            <path d="m320.851562 27.445312h-27.304687c-3.773437 0-6.828125-3.058593-6.828125-6.828124 0-3.769532 3.054688-6.828126 6.828125-6.828126h27.304687c3.773438 0 6.828126 3.058594 6.828126 6.828126 0 3.769531-3.054688 6.828124-6.828126 6.828124zm0 0"></path>
                                                        </g>
                                                    </svg>
                                                    <span class="mt-4 text-sm text-gray-600 font-medium">{{ __("We didn't find anything - just empty space.") }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 bg-gray-50 p-4 sm:p-5 rounded-md border border-gray-200">
                <p class="text-sm text-gray-600 font-medium leading-5">
                    {{ __("Do you like this feature? It's inspired by Laravel Mail Eclipse. You can sponsor the author") }}
                </p>
                <div class="mt-4">
                    <div class="-mx-2 -my-1.5 flex">
                        <a href="https://github.com/Qoraiche/laravel-mail-editor" target="_blank" class="px-3 py-2 rounded-md text-sm leading-5 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition ease-in-out duration-150">
                            {{ __('View the repo') }}
                        </a>
                        <a href="https://www.paypal.com/paypalme/streamaps" target="_blank" class="ml-3 inline-flex items-center px-3 py-2 border border-gray-300 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                            <svg class="w-5 h-5 text-pink-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            {{ __('Sponsor') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
