<div>
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{-- {{ $header }} --}}
            <div class="flex">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('List of All Users') }}
                </h2>
            </div>
        </div>
    </header>
    <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('admin.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                {{ __('Create New Admin') }}
            </a>
        </h2>
        <x-text-input wire:model="search" type="search" class="ml-2 py-0" placeholder="seacrh here"></x-text-input>
        <select name="filter" id="filter" wire:model="filter">
            <option value="">Select Filter</option>
            <option value="name">Name</option>
            <option value="id">ID</option>
            <option value="email">Email</option>
            <option value="phone">Phone</option>
        </select>
    </div>
    <div class="overflow-x-auto">
        <div class="overflow-hidden">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-left">Phone Number</th>
                            <th class="py-3 px-6 text-left">Address</th>
                            <th class="py-3 px-6 text-left">Created At</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse ($admins as $admin)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td>
                                <span>{{ $admin->id }}</span>
                            </td>
                            <td>
                                <span>{{ $admin->name }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $admin->email }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $admin->phone }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $admin->address }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $admin->created_at }}</span>
                            </td>
                            @empty
                                <td>
                                    No Data!
                                </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
