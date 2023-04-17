<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
           <div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
      <h1 class="text-base font-semibold leading-6 text-gray-900">Fill the data for your new contact</h1>
    </div>
  </div>
  <div class="mt-8 flow-root">
    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
        <form method="POST" action="{{ route('contacts.update', [$contact]) }}">
                    @method('PUT')
                    @csrf
                    <div class="md-3">
                        <label class="form-lebel">First Name</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter firstname" value="{{ $contact->first_name }}">
                        <!-- bej te gjitha si te rreshti 26(value) -->
                        <!-- bej vtm require error -->
                        @error('first_name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-lebel">Last Name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Enter lastname">
                    </div>
                    <div class="md-3">
                        <label class="form-lebel">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                    </div>
                    <div class="md-3">
                        <label class="form-lebel">Date of birth</label>
                        <input type="date" class="form-control" name="date_of_birth" placeholder="Enter date of birth" value="{{ $contact->date_of_birth?->format('Y-m-d') }}">
                    </div>
                    <div class="md-3">
                        <label class="form-lebel">Phone number</label>
                        <input type="tel" class="form-control" name="phone_number" placeholder="Enter phone number">
                    </div>
                    <div class="md-3">
                        <label class="form-lebel">Address</label>
                        <textarea class="form-control" name="address" placeholder="Enter addres"></textarea>
                    </div>
                    <div class="md-3">
                        <label class="form-lebel">City</label>
                        <input type="text" class="form-control" name="city" placeholder="Enter city">
                    </div>
                    <div class="md-3">
                        <label class="form-lebel">State</label>
                        <input type="text" class="form-control" name="state" placeholder="Enter state">
                    </div>
                    <div class="md-3">
                        <label class="form-lebel">Country</label>
                        <input type="text" class="form-control" name="country" placeholder="Enter country">
                    </div>
                    <div class="md-3">
                        <label class="form-lebel">Postal code</label>
                        <input type="text" class="form-control" name="postal_code" placeholder="Enter postal code">
                    </div><br>
                    <button type="submit"  class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" >Save</button>
                    <button type="button"  class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"  onclick="location.href='{{ url('contacts') }}'">Back</button>
                    </div>

               </form>
        </div>
      </div>
    </div>
  </div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>