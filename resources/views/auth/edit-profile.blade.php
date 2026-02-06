@extends('app')

@section('content')
<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-8">
            <!-- Sidebar -->
            <div class="col-span-3 md:col-span-1">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Account Menu</h3>
                    <nav class="space-y-2">
                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-gray-900">My Profile</a>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-md">Edit Profile</a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:text-gray-900">Logout</button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Edit Form -->
            <div class="col-span-3 md:col-span-2">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Edit Profile</h2>

                    @if ($errors->any())
                    <div class="mb-4 rounded-md bg-red-50 p-4">
                        <ul class="text-sm text-red-800 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if (session('success'))
                    <div class="mb-4 rounded-md bg-green-50 p-4">
                        <p class="text-sm text-green-800">{{ session('success') }}</p>
                    </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <select id="country" name="country" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select Country</option>
                                <option value="Malaysia" {{ old('country', $user->country) == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                                <option value="Oman" {{ old('country', $user->country) == 'Oman' ? 'selected' : '' }}>Oman</option>
                                <option value="Qatar" {{ old('country', $user->country) == 'Qatar' ? 'selected' : '' }}>Qatar</option>
                                <option value="Kuwait" {{ old('country', $user->country) == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
                                <option value="Bahrain" {{ old('country', $user->country) == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
                            </select>
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" id="city" name="city" value="{{ old('city', $user->city) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea id="address" name="address" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('address', $user->address) }}</textarea>
                        </div>

                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                            <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div>
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
