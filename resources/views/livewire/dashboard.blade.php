<div>
    <div class="py-4 space-y-4">
        <div class="grid grid-cols-4 gap-x-4">
            <div>
                <label for="location" class="block text-sm font-medium text-white">Category</label>
                <select wire:model="category"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                        name="category" id="category">
                    <option>Breaking Bad</option>
                    <option>Better Call Saul</option>
                </select>
            </div>
            <div>
                <label for="location" class="block text-sm font-medium text-white">Category</label>
                <select wire:model="season"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                        name="category" id="category">
                    <option value="0">All seasons</option>
                    <option value="1">Season 1</option>
                    <option value="2">Season 2</option>
                    <option value="3">Season 3</option>
                    <option value="4">Season 4</option>
                    <option value="5">Season 5</option>
                </select>
            </div>
            <div class="col-span-2">
                <label for="character" class="block text-sm font-medium text-white">Character</label>
                <div class="mt-1">
                    <input wire:model="character" type="text" name="character" id="character"
                           class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
        </div>
        <div class="flex flex-col space-y-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nickname
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Show</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            <!-- Odd row -->
                            @foreach($characters as $character)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{$character->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{$character->status_label}}-100 text-{{$character->status_label}}-800 capitalize">
                                        {{ucfirst($character->status)}}
                                    </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$character->nickname}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$character->category}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{route('character.show', $character)}}" class="text-indigo-600 hover:text-indigo-900">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
                {{$characters->links()}}
            </div>
        </div>
    </div>
</div>
