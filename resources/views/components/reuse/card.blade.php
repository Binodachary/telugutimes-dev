<div {{ $attributes->merge(['class'=>'card bg-white dark:bg-gray-700 border-t-4 border-gray-400 dark:border-gray-800 mt-6 rounded shadow-md']) }}>
    <div class="text-sm lg:text-xl p-2 border-b border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-400 font-bold flex">
        {{ $cardHeader ?? "" }}
    </div>
    <div class="card-body p-3">
        {{ $slot }}
    </div>
</div>
