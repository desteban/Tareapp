<div class="">
    <label class="flex flex-col space-y-3">
        {{ $label }}
        <textarea class="border rounded-md px-3 py-2 resize-none" name="{{ $name }}" id="{{ $name }}"
            cols="{{ $cols ?? 50 }}" rows="10" placeholder="{{ $placeholder }}" @required($required ?? false)>{{ $slot }}</textarea>
        </textarea>
    </label>
</div>
