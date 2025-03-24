<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('マイページ') }}
        </h2>
    </x-slot>

    @php
        $yearMonth = request('year_month', now()->format('Y/m'));
        list($selectedYear, $selectedMonth) = explode('/', $yearMonth);
        $daysInMonth = \Carbon\Carbon::create($selectedYear, $selectedMonth)->daysInMonth;
        $firstDayOfMonth = \Carbon\Carbon::create($selectedYear, $selectedMonth, 1)->dayOfWeek;
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- ウェルカムカード -->
            <div class="bg-gradient-to-r from-blue-500 to-green-500 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-white">
                    <h2 class="text-2xl font-bold mb-2">ようこそ、{{ Auth::user()->name }}さん！</h2>
                    <p class="mb-4">あなたのランニング記録を管理して、健康的な習慣を続けましょう。</p>
                    <a href="{{ route('running_records.create') ?? '#' }}" class="inline-block px-6 py-3 bg-white text-blue-600 rounded-lg hover:bg-gray-100 transition-colors duration-200 font-bold">
                        新しい記録を登録
                    </a>
                </div>
            </div>

            <!-- 統計カード -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">選択された月の走行距離</h3>
                        <p class="text-3xl font-bold text-blue-600 dark:text-blue-400"> {{ $selectedMonthDistance }} km</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">目標: 50.0 km</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 0%"></div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">今月の走行距離</h3>
                        <p class="text-3xl font-bold text-blue-600 dark:text-blue-400"> {{ $thisMonthDistance }} km</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">目標: 50.0 km</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 0%"></div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">累計走行距離</h3>
                        <p class="text-3xl font-bold text-green-600 dark:text-green-400"> {{ $totalDistance }} km</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">継続日数: 0日</p>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
                            <div class="bg-green-600 h-2.5 rounded-full" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- カレンダー -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">ランニングカレンダー</h3>
                    <div class="flex justify-center mb-4">
                        <form method="GET" action="{{ route('dashboard') }}">
                            <select name="year_month" onchange="this.form.submit()">
                                @for ($y = 2025; $y <= now()->year; $y++)
                                    @for ($m = 1; $m <= 12; $m++)
                                        <option value="{{ $y }}/{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}" {{ $y == $selectedYear && $m == $selectedMonth ? 'selected' : '' }}>
                                            {{ $y }}/{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}
                                        </option>
                                    @endfor
                                @endfor
                            </select>
                        </form>
                    </div>
                    <div class="grid grid-cols-7 gap-2 text-center">
                        <div class="text-xs font-medium text-gray-500 dark:text-gray-400">日</div>
                        <div class="text-xs font-medium text-gray-500 dark:text-gray-400">月</div>
                        <div class="text-xs font-medium text-gray-500 dark:text-gray-400">火</div>
                        <div class="text-xs font-medium text-gray-500 dark:text-gray-400">水</div>
                        <div class="text-xs font-medium text-gray-500 dark:text-gray-400">木</div>
                        <div class="text-xs font-medium text-gray-500 dark:text-gray-400">金</div>
                        <div class="text-xs font-medium text-gray-500 dark:text-gray-400">土</div>

                        <!-- 月初の空白を表示 -->
                        @for ($i = 0; $i < $firstDayOfMonth; $i++)
                            <div class="h-10 w-10"></div>
                        @endfor

                        <!-- 月の日付を表示 --> 
                        @for ($day = 1; $day <= $daysInMonth; $day++)
                            <div class="h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-sm mx-auto">
                                <a href="{{ route('running_records.create', ['date' => \Carbon\Carbon::create($selectedYear, $selectedMonth, $day)->toDateString()]) }}">
                                    {{ $day }}
                                </a>
                            </div>
                        @endfor
                    </div>
                    <div class="flex justify-center mt-4 space-x-4 text-sm">
                        <div class="flex items-center">
                            <div class="w-4 h-4 rounded-full bg-blue-500 mr-2"></div>
                            <span class="text-gray-600 dark:text-gray-300">1-5km</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 rounded-full bg-green-500 mr-2"></div>
                            <span class="text-gray-600 dark:text-gray-300">5-10km</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 rounded-full bg-purple-500 mr-2"></div>
                            <span class="text-gray-600 dark:text-gray-300">10km以上</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 最近の記録 -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">最近の記録</h3>
                        <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">すべて見る</a>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">日付</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">距離</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @if ($runningRecords->isEmpty())
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400" colspan="6">
                                        記録がありません。新しい記録を登録しましょう！
                                    </td>
                                </tr>
                                @endif
                                @if (!$runningRecords->isEmpty())
                                @foreach ($runningRecords as $runningRecord)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $runningRecord->date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $runningRecord->distance }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- モチベーションセクション -->
            <div class="bg-gradient-to-r from-blue-50 to-green-50 dark:from-blue-900 dark:to-green-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 mb-6 md:mb-0 md:pr-6">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">次の目標を設定しましょう！</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                目標を設定することで、モチベーションを維持し、継続的な成長を実現できます。
                                あなたの次のチャレンジは何ですか？
                            </p>
                            <a href="#" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                目標を設定する
                            </a>
                        </div>
                        <div class="md:w-1/2 flex justify-center">
                            <div class="running-man-container-small">
                                <svg width="150" height="150" viewBox="0 0 600 600" fill="none" xmlns="http://www.w3.org/2000/svg" class="running-man-small">
                                    <!-- 頭 -->
                                    <circle cx="300" cy="150" r="70" fill="#3B82F6"/>
                                    <!-- 体 -->
                                    <rect x="270" y="220" width="60" height="120" fill="#3B82F6" />
                                    <!-- 左腕 -->
                                    <path d="M270 240 L180 180 L170 200 L260 260Z" fill="#3B82F6" />
                                    <!-- 右腕 -->
                                    <path d="M330 240 L420 180 L430 200 L340 260Z" fill="#3B82F6" />
                                    <!-- 左足 -->
                                    <path d="M270 340 L220 440 L250 450 L290 350Z" fill="#3B82F6" />
                                    <!-- 右足 -->
                                    <path d="M330 340 L380 440 L350 450 L310 350Z" fill="#3B82F6" />
                                    <!-- 顔 -->
                                    <circle cx="280" cy="140" r="10" fill="white" />
                                    <circle cx="320" cy="140" r="10" fill="white" />
                                    <path d="M280 180 Q300 200 320 180" stroke="white" stroke-width="5" fill="none" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes bounce-small {
            0%, 100% {
                transform: translateY(0) rotateZ(0deg);
            }
            50% {
                transform: translateY(-10px) rotateZ(5deg);
            }
        }
        
        .running-man-small {
            animation: bounce-small 1s ease-in-out infinite;
        }
    </style>
</x-app-layout>
