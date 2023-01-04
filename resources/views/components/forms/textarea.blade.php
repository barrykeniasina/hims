<div @class(['mb-3' => isset($label),]) >
    @if($label ?? null)
        @if($help ?? null)
            <div class="{{ ($required ?? false) ? 'label label-required' : 'label' }}">
                <label class="{{ ($required ?? false) ? 'form-label form-label-required' : 'form-label' }}" for="{{ $id ?? $name }}">
                    {{ $label }}
                </label>
                <a tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" title="Information" data-bs-content="{{ $help }}"><i class="fas fa-info-circle"></i></a>
            </div>
        @else
            <label class="{{ ($required ?? false) ? 'form-label form-label-required' : 'form-label' }}" for="{{ $id ?? $name }}">
                {{ $label }}
            </label>
        @endif
    @endif
    <textarea
        autocomplete="off"
        rows="{{ $rows ?? 3 }}"
        name="{{ $name }}"
        id="{{ $id ?? $name }}"
        class="input form-control"
        placeholder="{{ $placeholder ?? $label ?? '' }}"
        {{ ($required ?? false) ? 'required' : '' }}
        {{ Arr::except($attributes, ['required', 'placeholder', 'label', 'class', 'name', 'id', 'rows' , 'value', 'help']) }}
>{{ old($name, $value ?? '') }}</textarea>
    @error($name)
    <p class="form-error text-danger" role="alert">{{ $message }}</p>
    @enderror
</div>
