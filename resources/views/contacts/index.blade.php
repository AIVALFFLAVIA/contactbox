<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact List') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex h-full bg-white rounded-lg">
                <div class="flex min-w-0 flex-1 flex-col overflow-hidden">
                    <div class="lg:hidden">
                        <div class="flex items-center justify-between border-b border-gray-200 bg-gray-50 px-4 py-1.5">
                            <div>
                                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=pink&shade=500" alt="Your Company">
                            </div>
                            <div>
                                <button type="button" class="-mr-3 inline-flex h-12 w-12 items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-pink-600">
                                    <span class="sr-only">Open sidebar</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-0 flex flex-1 overflow-hidden">
                        <main class="relative z-0 flex-1 overflow-y-auto focus:outline-none xl:order-last">
                            <!-- Breadcrumb -->
                            <nav class="flex items-start px-4 py-3 sm:px-6 lg:px-8 xl:hidden" aria-label="Breadcrumb">
                                <a href="#" class="inline-flex items-center space-x-3 text-sm font-medium text-gray-900">
                                    <svg class="-ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Contacts</span>
                                </a>
                            </nav>

                            <article>
                                <!-- Profile header -->
                                @if ($selectedContact)
                                    <div>
                                        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                                            <div class="mt-8 sm:flex justify-between">
                                                <div class="flex space-x-2 items-center">
                                                    <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-24 sm:w-24" src="{{ $selectedContact->avatar }}" alt="">
                                                    <div class="min-w-0 flex-1 sm:hidden 2xl:block">
                                                        <h1 class="truncate text-2xl font-bold text-gray-900">{{ $selectedContact->first_name }} {{ $selectedContact->last_name }}</h1>
                                                        <span class="mt-1 text-sm text-gray-900">{{ $selectedContact->phone_number }}</span>
                                                    </div>
                                                </div>
                                                <div class="sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                                                    <div class="flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-x-4 sm:space-y-0">
                                                        <a href="{{ route('contacts.edit', ['contact' => $selectedContact->id]) }}">
                                                            <button type="button" class="inline-flex justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                                                <svg class="-ml-0.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                    <path d="M4.646 13.354L15 3h2v2L6.707 15.354l-.707.707v-2l9.647-9.647-1.414-1.414L4.646 13.354z" />
                                                                    <path d="M14 7.414l-1.293-1.293a1 1 0 00-1.414 0l-8 8V15h3.586l8-8z" />
                                                                </svg>
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <form method="POST" action="{{ route('contacts.destroy', [$selectedContact->id]) }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="inline-flex justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                                                <svg class="-ml-0.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M5 6a1 1 0 011-1h8a1 1 0 011 1v10a1 1 0 01-1 1H6a1 1 0 01-1-1V6zm1-1a2 2 0 012-2h6a2 2 0 012 2v10a2 2 0 01-2 2H8a2 2 0 01-2-2V5zm4.707 6.707a1 1 0 000-1.414l-.707-.707a1 1 0 00-1.414 0L7 10.586 5.707 9.293a1 1 0 00-1.414 1.414l1.768 1.768-1.768 1.768a1 1 0 001.414 1.414L7 14.414l1.293 1.293a1 1 0 001.414-1.414L9.414 13.4l1.768-1.768a1 1 0 000-1.414z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                                Delete
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-6 hidden min-w-0 flex-1 sm:block 2xl:hidden">
                                                <h1 class="truncate text-2xl font-bold text-gray-900">{{ $selectedContact->first_name }} {{ $selectedContact->last_name }}</h1>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tabs -->
                                    <div class="mt-6 sm:mt-2 2xl:mt-5">
                                        <div class="border-b border-gray-200">
                                            <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
                                                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                                    <a href="{{ route('contacts.index', ['search' => request()->search, 'contact' => request()->contact]) }}"
                                                        class="{{ !request()->tab || request()->tab === 'profile' ? 'border-pink-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} border-b-2 py-4 px-1 text-sm font-medium" aria-current="page">
                                                        Profile
                                                    </a>
                                                    <a href="{{ route('contacts.index', ['search' => request()->search, 'contact' => request()->contact, 'tab' => 'notes']) }}"
                                                        class="{{ request()->tab === 'notes' ? 'border-pink-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} border-b-2 py-4 px-1 text-sm font-medium" aria-current="page">Notes</a>
                                                    {{-- <a href="{{ route('contacts.index', ['search' => request()->search, 'contact' => request()->contact, 'tab' => 'reminders']) }}"
                                                        class="{{ request()->tab === 'reminders' ? 'border-pink-500 text-gray-900' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} border-b-2 py-4 px-1 text-sm font-medium" aria-current="page">Reminders</a> --}}
                                                </nav>
                                            </div>
                                        </div>
                                    </div>

                                    @if (!request()->tab || request()->tab === 'profile')
                                        <!-- Description list -->
                                        <div class="mx-auto py-6 max-w-5xl px-4 sm:px-6 lg:px-8">
                                            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                                <div class="sm:col-span-1">
                                                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                                    <dd class="mt-1 text-sm text-gray-900">{{ $selectedContact->phone_number }}</dd>
                                                </div>
                                                <div class="sm:col-span-1">
                                                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                                                    <dd class="mt-1 text-sm text-gray-900">{{ $selectedContact->email }}</dd>
                                                </div>
                                                <div class="sm:col-span-1">
                                                    <dt class="text-sm font-medium text-gray-500">Street address</dt>
                                                    <dd class="mt-1 text-sm text-gray-900">{{ $selectedContact->address }}</dd>
                                                </div>
                                                <div class="sm:col-span-1">
                                                    <dt class="text-sm font-medium text-gray-500">City</dt>
                                                    <dd class="mt-1 text-sm text-gray-900">{{ $selectedContact->city }}</dd>
                                                </div>
                                                <div class="sm:col-span-1">
                                                    <dt class="text-sm font-medium text-gray-500">State / Province</dt>
                                                    <dd class="mt-1 text-sm text-gray-900">{{ $selectedContact->state }}</dd>
                                                </div>
                                                <div class="sm:col-span-1">
                                                    <dt class="text-sm font-medium text-gray-500">Country</dt>
                                                    <dd class="mt-1 text-sm text-gray-900">{{ $selectedContact->country }}</dd>
                                                </div>
                                                <div class="sm:col-span-1">
                                                    <dt class="text-sm font-medium text-gray-500">ZIP / Postal code</dt>
                                                    <dd class="mt-1 text-sm text-gray-900">{{ $selectedContact->postal_code }}</dd>
                                                </div>
                                                <div class="sm:col-span-1">
                                                    <dt class="text-sm font-medium text-gray-500">Birthday</dt>
                                                    <dd class="mt-1 text-sm text-gray-900">{{ $selectedContact->date_of_birth->format('d/m/Y') }}</dd>
                                                </div>
                                            </dl>
                                        </div>
                                    @endif

                                    @if (request()->tab === 'notes')
                                        <div class="mx-auto py-6 max-w-5xl px-4 sm:px-6 lg:px-8">
                                            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                                <div class="sm:col-span-2">
                                                    <div class="flow-root mt-4 space-y-5">
                                                        <ul role="list" class="-mb-8">
                                                            @foreach ($selectedContact->notes as $note)
                                                                <li>
                                                                    <div class="relative pb-8">
                                                                        @if (!$loop->last)
                                                                            <span class="absolute left-5 top-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                                                        @endif
                                                                        <div class="relative flex items-start space-x-3">
                                                                            <div class="relative">
                                                                                <img class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-400 ring-8 ring-white" src="{{ $note->user->avatar }}" alt="">
                                                                            </div>
                                                                            <div class="min-w-0 flex-1">
                                                                                <div>
                                                                                    <div class="text-sm">
                                                                                        <a href="#" class="font-medium text-gray-900">{{ $note->user->name }}</a>
                                                                                    </div>
                                                                                    <p class="mt-0.5 text-sm text-gray-500">Notted {{ $note->created_at->diffForHumans() }}</p>
                                                                                </div>
                                                                                <div class="mt-2 text-sm text-gray-700">
                                                                                    <p>
                                                                                        {{ $note->note }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </dl>

                                            <div class="mt-6 flex gap-x-3">
                                                <img src="{{ auth()->user()->avatar }}" alt="" class="h-6 w-6 flex-none rounded-full bg-gray-50">
                                                <form method="POST" action="{{ route('contacts.notes.store', ['contact' => $selectedContact]) }}" class="relative flex-auto">
                                                    @csrf
                                                    <div class="overflow-hidden rounded-lg pb-12 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                                                        <label for="note" class="sr-only">Add your notes</label>
                                                        <textarea rows="2" name="note" id="note" class="block w-full resize-none border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" required placeholder="Add your notes..."></textarea>
                                                    </div>

                                                    <div class="absolute inset-x-0 bottom-0 flex justify-end py-2 pl-3 pr-2">
                                                        <button type="submit" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Save Note</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </article>
                        </main>
                        <aside class="hidden w-96 flex-shrink-0 border-r border-gray-200 xl:order-first xl:flex xl:flex-col">
                            <div class="px-6 pb-4 pt-6">
                                <ul class="flex gap-14">
                                    <li class="flex-grow-0">
                                        <h2 class="text-lg font-medium text-gray-900">Contacts</h2>
                                    </li>
                                    <li class="flex-grow text-right">
                                        <a href="{{ route('contacts.create') }}">
                                            <button type="button" class="inline-flex justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                                <svg class="-ml-0.5 h-5 w-5 text-gray-400" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill="none" d="M0 0h24v24H0z" />
                                                    <path d="M2 22a8 8 0 1 1 16 0H2zm8-9c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm10 4h4v2h-4v-2zm-3-5h7v2h-7v-2zm2-5h5v2h-5V7z" />
                                                </svg>
                                                Add Contact
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                                <p class="mt-1 text-sm text-gray-600">Search {{ $contacts->total() }} contacts</p>
                                <form class="mt-6 flex gap-x-4" method="GET" action="{{ route('contacts.index', ['search' => request()->search]) }}">
                                    <div class="min-w-0 flex-1">
                                        <label for="search" class="sr-only">Search</label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <input type="search" name="search" id="search" class="block w-full rounded-md border-0 py-1.5 pl-10 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-500 sm:text-sm sm:leading-6"
                                                placeholder="Search" value="{{ request()->get('search') }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="inline-flex justify-center rounded-md bg-white px-3 py-2 text-gray-400 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </form>
                            </div>
                            <!-- Directory list -->
                            <nav class="min-h-0 flex-1 overflow-y-auto" aria-label="Directory">
                                <div class="relative">
                                    <ul role="list" class="relative z-0 divide-y divide-gray-200">
                                        @foreach ($contacts as $contact)
                                            <li class="{{ $contact->id == request('contact') ? 'bg-gray-50' : '' }}">

                                                <div class="relative flex items-center space-x-3 px-6 py-5 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-500 hover:bg-gray-50">
                                                    <div class="flex-shrink-0">
                                                        <img class="h-10 w-10 rounded-full" src="{{ $contact->avatar }}" alt="">
                                                    </div>
                                                    <div class="min-w-0 flex-1">
                                                        <a href="{{ route('contacts.index', ['search' => request()->search, 'contact' => $contact->id]) }}" class="focus:outline-none">
                                                            <!-- Extend touch target to entire panel -->
                                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                                            <p class="text-sm font-medium text-gray-900"> {{ $contact->first_name }} {{ $contact->last_name }}</p>
                                                            <p class="truncate text-sm text-gray-500">{{ $contact->phone_number }}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </nav>
                        </aside>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
