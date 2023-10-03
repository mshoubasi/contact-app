<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('People') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold pb-5">Edit a person: {{ $person->firstname }} {{ $person->lastname }}</h3>
                    <form action="{{ route('person.update', $person->id) }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-400  ">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @method('PUT')
                        <div class="grid grid-cols-1 sm:grid-cols-6 gap-x-6 gap-y-6">
                            <span class="sm:col-span-3">
                                <label class="block" for="firstname">First name</label>
                                <input class="block w-full" type="text" name="firstname" id="firstname"
                                    value="{{ old('firstname', $person->firstname) }}">
                            </span>
                            <span class="sm:col-span-3">
                                <label class="block" for="lastname">Last name</label>
                                <input class="block w-full" type="text" name="lastname" id="lastname"
                                    value="{{ old('lastname', $person->lastname) }}">
                            </span>
                            <span class="sm:col-span-3">
                                <label class="block" for="email">Email</label>
                                <input class="block w-full" type="text" name="email" id="email"
                                    value="{{ old('email', $person->email) }}">
                            </span>
                            <span class="sm:col-span-3">
                                <label class="block" for="phone">Phone</label>
                                <input class="block w-full" type="text" name="phone" id="phone"
                                    value="{{ old('phone', $person->phone) }}">
                            </span>
                            <span class="sm:col-span-3">
                                <label class="block" for="business">Business</label>
                                <select class="block w-full" name="business_id" id="business_id">
                                    <option value="" @selected('' == old('business_id', $person->business_id))>( No Business )</option>
                                    @foreach ($businesses as $business)
                                        <option value="{{ $business->id }}" @selected($business->id == old('business_id', $person->business_id))>
                                            {{ $business->business_name }}</option>
                                    @endforeach
                                </select>
                            </span>
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('person.index') }}">Cancel</a>
                            <button class="bg-blue-600 text-white py-2 px-3 rounded-full" type="submit">Save</button>
                        </div>
                    </form>

                    <form action="{{ route('person.destroy', $person->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="border bg-red-400 text-white mt-6 p-6">
                            <h3 class="font-semibold">Danger Zone</h3>
                            <button type="submit">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>

                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
