@props(['active', 'href', 'color' => 'blue'])

@php
$colorClasses = [
    'blue' => ['text' => 'text-blue-600 dark:text-blue-400', 'bg' => 'bg-blue-50 dark:bg-blue-900/20'],
    'emerald' => ['text' => 'text-emerald-600 dark:text-emerald-400', 'bg' => 'bg-emerald-50 dark:bg-emerald-900/20'],
    'purple' => ['text' => 'text-purple-600 dark:text-purple-400', 'bg' => 'bg-purple-50 dark:bg-purple-900/20'],
    'amber' => ['text' => 'text-amber-600 dark:text-amber-400', 'bg' => 'bg-amber-50 dark:bg-amber-900/20'],
    'rose' => ['text' => 'text-rose-600 dark:text-rose-400', 'bg' => 'bg-rose-50 dark:bg-rose-900/20'],
    'indigo' => ['text' => 'text-indigo-600 dark:text-indigo-400', 'bg' => 'bg-indigo-50 dark:bg-indigo-900/20'],
    'cyan' => ['text' => 'text-cyan-600 dark:text-cyan-400', 'bg' => 'bg-cyan-50 dark:bg-cyan-900/20'],
    'sky' => ['text' => 'text-sky-600 dark:text-sky-400', 'bg' => 'bg-sky-50 dark:bg-sky-900/20'],
    'slate' => ['text' => 'text-slate-600 dark:text-slate-400', 'bg' => 'bg-slate-100 dark:bg-slate-800'],
];

$selectedColor = $colorClasses[$color] ?? $colorClasses['blue'];

$classes = ($active ?? false)
            ? 'flex items-center py-2.5 bg-blue-600 text-white rounded-2xl shadow-lg shadow-blue-600/30 font-bold transition-all relative group overflow-hidden whitespace-nowrap'
            : 'flex items-center py-2.5 text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800/50 rounded-2xl transition-all font-bold relative group overflow-hidden whitespace-nowrap';

$iconContainerActive = 'w-9 h-9 rounded-xl flex items-center justify-center bg-white/20 text-white flex-shrink-0 transition-transform group-hover:scale-110';
$iconContainerInactive = 'w-9 h-9 rounded-xl flex items-center justify-center ' . $selectedColor['bg'] . ' ' . $selectedColor['text'] . ' flex-shrink-0 transition-transform group-hover:scale-110';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} :class="sidebarOpen ? 'px-3 lg:px-4' : 'justify-center px-0'">
    <div class="{{ ($active ?? false) ? $iconContainerActive : $iconContainerInactive }}">
        {{ $icon ?? '' }}
    </div>
    <span x-show="sidebarOpen" class="ml-3.5 transition-opacity">{{ $slot }}</span>
</a>
