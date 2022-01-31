<div>
    <div class="bg-white rounded-lg shadow mt-4 px-5 py-6 sm:px-6">
        <div class="my-6 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <img class="object-contain h-72 rounded-lg mb-6" src="{{$character->img}}" alt="avatar">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-3">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Nickname
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{$character->nickname ?? 'Unknown'}}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Occupation
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{implode(', ', $character->occupation)}}
                    </dd>
                </div>

                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">
                        Status
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        {{ucfirst($character->status)}}
                    </dd>
                </div>

                @if($death = $character->death)
                    <div class="sm:col-span-3 space-y-4">
                        <h1 class="text-xl font-bold">Death details</h1>
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-3">
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Cause of death
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{$death->cause}}
                                </dd>
                            </div>

                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Responsible
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{$death->responsible}}
                                </dd>
                            </div>

                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Last words
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    "{{$death->last_words}}"
                                </dd>
                            </div>

                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Last appearance
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    S{{$death->season}}E{{$death->episode}}
                                </dd>
                            </div>

                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">
                                    Death caused count
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    {{$character->total_death_caused}}
                                </dd>
                            </div>
                        </dl>
                    </div>
                @endif

                @if($character->quotes)
                    <div class="sm:col-span-3 space-y-4">
                        <h1 class="text-xl font-bold">Famous quotes</h1>
                        <dd class="mt-1 text-sm text-gray-900 grid grid-cols-3 gap-4">
                            @foreach($character->quotes as $quote)
                                <div class="flex flex-col justify-center p-4 text-gray-800 bg-white rounded-lg shadow">
                                    <div class="mb-2">
                                        <div class="h-3 text-3xl text-left text-gray-600">“</div>
                                        <p class="px-4 text-sm text-center text-gray-600">{{$quote->quote}}</p>
                                        <div class="h-3 text-3xl text-right text-gray-600">”</div>
                                    </div>
                                </div>
                            @endforeach
                        </dd>
                    </div>
                @endif
            </dl>
        </div>
    </div>
</div>
