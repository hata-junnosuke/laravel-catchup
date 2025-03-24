<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('記録を編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    <form method="POST" action="{{ route('running_records.update', $runningRecord->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="date" :value="__('日付')" />
                            <input id="date" class="block mt-1 w-full" type="date" name="date" value="{{ $runningRecord->date }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="distance" :value="__('距離 (km)')" />
                            <input id="distance" class="block mt-1 w-full" type="number" step="1" name="distance" value="{{ $runningRecord->distance }}" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button class="ml-4">
                                {{ __('更新') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 