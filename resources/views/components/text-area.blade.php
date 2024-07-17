<div class="">
    <label class="flex flex-col space-y-3">
        {{ $label }}
        <textarea class="border rounded-md shadow-lg py-2 min-h-80" name="{{ $name }}" id="{{ $name }}"
            cols="{{ $cols ?? 50 }}" placeholder="{{ $placeholder }}" @required($required ?? false) value="{{old('')}}">
            {{$slot}}
        </textarea>
    </label>
</div>
