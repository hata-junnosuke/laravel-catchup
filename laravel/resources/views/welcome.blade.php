<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RunTracker - あなたの走りをサポート</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gradient-to-br from-blue-50 to-green-100 dark:from-blue-900 dark:to-green-800">
            <!-- ヘッダー -->
            <nav class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border-b border-gray-100 dark:border-gray-700 sticky top-0 z-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-green-500 bg-clip-text text-transparent">
                                RunTracker
                            </span>
                        </div>
                        <div class="flex items-center space-x-4">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                        マイページ
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors duration-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                                        ログイン
                                    </a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                                            新規登録
                                        </a>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <!-- ヒーローセクション -->
            <div class="relative overflow-hidden">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                    <div class="text-center relative z-10">
                        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                            あなたの走りを、
                            <span class="bg-gradient-to-r from-blue-600 to-green-500 bg-clip-text text-transparent">
                                次のレベルへ
                            </span>
                        </h1>
                        <p class="text-xl md:text-2xl text-gray-600 dark:text-gray-300 mb-12 max-w-3xl mx-auto">
                            日々のランニングを記録し、成長を可視化。
                            <br class="hidden sm:block">
                            モチベーション維持をサポートする最高のランニングパートナー
                        </p>
                        <div class="flex justify-center gap-4">
                            <a href="{{ route('register') ?? '#' }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 font-bold">
                                今すぐ始める
                            </a>
                            <a href="#features" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors duration-200 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-600">
                                機能を見る
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- 走る男のアニメーション -->
                <div class="absolute bottom-0 right-0 transform translate-x-1/4 -translate-y-12 lg:translate-x-0 lg:-translate-y-16 z-0 opacity-80 dark:opacity-60">
                    <div class="running-man-container">
                        <div class="speech-bubble ">
                            <p>走るのをやめさせないで！</p>
                        </div>
                        <svg width="300" height="300" viewBox="0 0 600 600" fill="none" xmlns="http://www.w3.org/2000/svg" class="running-man">
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
                            <path d="M280 180 Q300 200 320 180" stroke="white" stroke-width="5" fill="none" class="face-expression" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- 特徴セクション -->
            <div id="features" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
                <h2 class="text-3xl font-bold text-center mb-12 text-gray-900 dark:text-white">主な機能</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- 特徴カード1 -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
                        <div class="text-blue-500 text-3xl mb-6">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">走行距離の累計</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            毎日の走行距離を自動で累計。週間・月間・年間の集計も一目でわかり、長期的な成長が実感できます。目標設定機能で自分のペースに合わせた挑戦も可能です。
                        </p>
                    </div>

                    <!-- 特徴カード2 -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
                        <div class="text-blue-500 text-3xl mb-6">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">日付ごとの管理</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            各ランニングセッションを日付ごとに詳細記録。距離だけでなく、ペース、消費カロリー、走行ルートなど多彩なデータを簡単に記録・確認できます。
                        </p>
                    </div>

                    <!-- 特徴カード3 -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
                        <div class="text-blue-500 text-3xl mb-6">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">カラフルカレンダー</h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            ランニングした日はカレンダーの色が変わり、一目で習慣化の状況がわかります。連続記録や目標達成で色の濃さも変化し、モチベーション維持をサポートします。
                        </p>
                    </div>
                </div>
            </div>

            <!-- アプリ画面のモックアップ -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">シンプルで使いやすいインターフェース</h2>
                        <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                            直感的な操作で、ランニングデータを簡単に記録・管理。あなたの成長を美しく可視化します。
                        </p>
                    </div>
                    <div class="flex justify-center">
                        <div class="w-full max-w-4xl bg-gray-100 dark:bg-gray-700 rounded-xl p-2 md:p-4 shadow-inner">
                            <div class="bg-gray-800 rounded-lg p-4 text-white">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div class="bg-gray-700 rounded-lg p-4">
                                        <h4 class="font-bold mb-2">今月の統計</h4>
                                        <div class="text-3xl font-bold text-blue-400">42.5 km</div>
                                        <div class="text-green-400 text-sm">+12% 先月比</div>
                                    </div>
                                    <div class="bg-gray-700 rounded-lg p-4 col-span-2">
                                        <h4 class="font-bold mb-2">走行カレンダー</h4>
                                        <div class="grid grid-cols-7 gap-2">
                                            <!-- カレンダーの例 -->
                                            <div class="text-xs text-center">月</div>
                                            <div class="text-xs text-center">火</div>
                                            <div class="text-xs text-center">水</div>
                                            <div class="text-xs text-center">木</div>
                                            <div class="text-xs text-center">金</div>
                                            <div class="text-xs text-center">土</div>
                                            <div class="text-xs text-center">日</div>
                                            
                                            <div class="h-8 w-8 rounded-full bg-gray-600 flex items-center justify-center">1</div>
                                            <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center">2</div>
                                            <div class="h-8 w-8 rounded-full bg-gray-600 flex items-center justify-center">3</div>
                                            <div class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center">4</div>
                                            <div class="h-8 w-8 rounded-full bg-gray-600 flex items-center justify-center">5</div>
                                            <div class="h-8 w-8 rounded-full bg-blue-700 flex items-center justify-center">6</div>
                                            <div class="h-8 w-8 rounded-full bg-gray-600 flex items-center justify-center">7</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 走る男のトレイル -->
            <div class="absolute bottom-0 left-0 w-full h-16 bg-gradient-to-r from-blue-500/10 via-green-500/20 to-blue-500/10 dark:from-blue-800/20 dark:via-green-700/30 dark:to-blue-700/20"></div>

            <!-- フッター -->
            <footer class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm border-t border-gray-100 dark:border-gray-700 py-8 relative z-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center text-gray-600 dark:text-gray-400">
                        <p>© 2023 RunTracker - あなたの走りをサポート</p>
                    </div>
                </div>
            </footer>
        </div>

        <style>
            @keyframes run {
                0% {
                    transform: translateX(-100%) rotate(0deg);
                }
                100% {
                    transform: translateX(100vw) rotate(0deg);
                }
            }
            
            .running-man-container {
                width: 300px;
                height: 300px;
                overflow: visible;
                position: relative;
            }
            
            .running-man {
                animation: run 8s linear infinite, bounce 0.3s ease-in-out alternate infinite;
                transform-origin: center;
                cursor: pointer;
            }
            
            @keyframes bounce {
                0%, 100% {
                    transform: translateY(0) rotateZ(0deg);
                }
                25% {
                    transform: translateY(-15px) rotateZ(-5deg);
                }
                75% {
                    transform: translateY(-20px) rotateZ(5deg);
                }
            }
            
            @keyframes armSwing {
                0% {
                    transform: rotateZ(-15deg);
                }
                50% {
                    transform: rotateZ(15deg);
                }
                100% {
                    transform: rotateZ(-15deg);
                }
            }
            
            .speech-bubble {
                position: absolute;
                top: -60px;
                left: 50%;
                transform: translateX(-50%);
                background-color: white;
                border-radius: 10px;
                padding: 8px 12px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                z-index: 5;
                white-space: nowrap;
            }
            
            .speech-bubble:after {
                content: '';
                position: absolute;
                bottom: -10px;
                left: 50%;
                transform: translateX(-50%);
                border-width: 10px 10px 0;
                border-style: solid;
                border-color: white transparent transparent;
            }
            
            .face-expression.angry {
                d: path("M280 180 Q300 220 320 180");
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const runningMan = document.querySelector('.running-man');
                const speechBubble = document.querySelector('.speech-bubble');
                const faceExpression = document.querySelector('.face-expression');
                
                const complaints = [
                    "もう走るのやめたい！",
                    "クリックしないで！走りたくないよ！",
                    "休ませてよ！疲れた！",
                    "毎日走るのはきついよ...",
                    "あと何キロ走ればいいの？",
                    "水分補給させて！",
                    "もう限界…",
                    "なぜ私を走らせるの？",
                    "こんなに走って何になるの？",
                    "パタリロ！(疲れた顔)"
                ];
                
                let clickCount = 0;
                
                runningMan.addEventListener('click', function() {
                    // ランダムな文句を表示
                    const randomComplaint = complaints[Math.floor(Math.random() * complaints.length)];
                    speechBubble.querySelector('p').textContent = randomComplaint;
                    speechBubble.classList.remove('hidden');
                    
                    // 顔の表情を変える
                    faceExpression.classList.add('angry');
                    
                    // アニメーションをより速くする
                    runningMan.style.animationDuration = (5 - Math.min(clickCount, 4)) + "s, 0.2s";
                    
                    // カウントアップ
                    clickCount++;
                    
                    // 5秒後に吹き出しを非表示
                    setTimeout(function() {
                        speechBubble.classList.add('hidden');
                        faceExpression.classList.remove('angry');
                    }, 5000);
                });
            });
        </script>
    </body>
</html>
