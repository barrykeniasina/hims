<div @class(['mb-3' => isset($label),]) >
    @if($label ?? null)
        <label class="{{ ($required ?? false) ? 'form-label form-label-required' : 'form-label' }}" for="{{ $id ?? $name }}">
            {{ $label }}
            @if($help ?? null)
                <a tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" title="Information" data-bs-content="{{ $help }}"><i class="fas fa-info-circle"></i></a>
            @endif
        </label>
    @endif
    <div class="input-group">
        <input
            autocomplete="off"
            type="{{ $type ?? 'date' }}"
            name="{{ $name }}"
            id="{{ $id ?? $name }}"
            class="input form-control"
            placeholder="{{ $placeholder ?? '' }}"
            value="{{ old($name, $value ?? '') }}"
            {{ ($required ?? false) ? 'required' : '' }}
            {{ Arr::except($attributes, ['required', 'placeholder', 'label', 'class', 'name', 'id', 'value']) }} />
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
    </div>
    @error($name)
    <p class="form-error text-danger" role="alert">{{ $message }}</p>
    @enderror
</div>
