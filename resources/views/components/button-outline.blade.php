<button type="{{ $type ?? 'button' }}"
    class="text-inherit border-2 px-4 py-2 rounded-md w-full hover:bg-neutral-100 transition duration-300 {{ $class ?? '' }}">
    {{ $slot }}
</button>
