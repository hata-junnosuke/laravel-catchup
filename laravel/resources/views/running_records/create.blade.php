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
                            <x-text-input id="distance" class="block mt-1 w-full" type="number" name="distance" :value="old('distance')" required step="0.01" min="0.01" />
                            <x-input-error :messages="$errors->get('distance')" class="mt-2" />
                        </div>

                        <!-- 時間 -->
                        <!-- <div>
                            <x-input-label for="duration" :value="__('走行時間 (分)')" />
                            <x-text-input id="duration" class="block mt-1 w-full" type="number" name="duration" :value="old('duration')" required min="1" />
                            <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                        </div> -->

                        <!-- 場所 -->
                        <!-- <div>
                            <x-input-label for="location" :value="__('走行場所')" />
                            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')" />
                            <x-input-error :messages="$errors->get('location')" class="mt-2" />
                        </div> -->

                        <!-- メモ -->
                        <!-- <div>
                            <x-input-label for="notes" :value="__('メモ')" />
                            <textarea id="notes" name="notes" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 shadow-sm" rows="3">{{ old('notes') }}</textarea>
                            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                        </div> -->

                        <!-- 天気 -->
                        <!-- <div>
                            <x-input-label for="weather" :value="__('天気')" />
                            <select id="weather" name="weather" class="block mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 shadow-sm">
                                <option value="晴れ" {{ old('weather') == '晴れ' ? 'selected' : '' }}>晴れ</option>
                                <option value="曇り" {{ old('weather') == '曇り' ? 'selected' : '' }}>曇り</option>
                                <option value="雨" {{ old('weather') == '雨' ? 'selected' : '' }}>雨</option>
                                <option value="雪" {{ old('weather') == '雪' ? 'selected' : '' }}>雪</option>
                                <option value="その他" {{ old('weather') == 'その他' ? 'selected' : '' }}>その他</option>
                            </select>
                            <x-input-error :messages="$errors->get('weather')" class="mt-2" />
                        </div> -->

                        <!-- 気分 -->
                        <!-- <div></div>
                            <x-input-label for="feeling" :value="__('気分')" />
                            <div class="mt-2 flex space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="feeling" value="良い" class="text-blue-600" {{ old('feeling') == '良い' ? 'checked' : '' }}>
                                    <span class="ml-2">良い</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="feeling" value="普通" class="text-blue-600" {{ old('feeling') == '普通' ? 'checked' : '' }} checked>
                                    <span class="ml-2">普通</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="feeling" value="悪い" class="text-blue-600" {{ old('feeling') == '悪い' ? 'checked' : '' }}>
                                    <span class="ml-2">悪い</span>
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('feeling')" class="mt-2" />
                        </div> -->

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
