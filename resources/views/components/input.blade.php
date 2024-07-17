<div class="mb-4">
    <label class="flex flex-col space-y-3">
        {{ $label }}
        <input class="px-1 py-1 rounded-md border-[2px]" type="{{ $type ?? 'text' }}" id="{{ $name }}"
            name="{{ $name }}" value="{{ $value ?? '' }}" placeholder="{{ $placeholder ?? '' }}" @required($required ?? false)/>

    </label>
    {{ $slot }}
</div>
