<button type="{{ $type ?? 'button' }}"
    class="bg-black text-white px-4 py-2 rounded-md w-full hover:bg-opacity-85 transition duration-300 {{ $class ?? '' }}">
    {{ $slot }}
</button>
