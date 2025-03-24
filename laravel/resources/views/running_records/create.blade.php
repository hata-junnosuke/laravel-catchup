<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('ランニング記録の登録') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('running_records.store') ?? '#' }}" class="space-y-6">
                        @csrf

                        <!-- 日付 -->
                        <div>
                            <x-input-label for="date" :value="__('日付')" />
                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date', date('Y-m-d'))" required autofocus />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <!-- 距離 -->
                        <div>
                            <x-input-label for="distance" :value="__('走行距離 (km)')" />
                            <x-text-input id="distance" class="block mt-1 w-full" type="number" name="distance" :value="old('distance')" required step="1" min="1" />
                            <x-input-error :messages="$errors->get('distance')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors duration-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600 mr-4">
                                キャンセル
                            </a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                記録を保存
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
