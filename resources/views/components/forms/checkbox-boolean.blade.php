<div @class(['mb-3' => isset($label),]) >
    @if($label ?? null)
        @if($help ?? null)
            <div class="{{ ($required ?? false) ? 'form-label form-label-required' : 'form-label' }}">
                <label for="{{ $id ?? $name }}">{{ $label }}</label>
                <a tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" title="Information" data-bs-content="{{ $help }}"><i class="fas fa-info-circle"></i></a>
            </div>
        @else
            <label class="{{ ($required ?? false) ? 'form-label form-label-required' : 'form-label' }}" for="{{ $id ?? $name }}">
                {{ $label }}
            </label>
        @endif
    @endif
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1"
                    @checked(old($name, $value ?? ''))
                   name="{{ $name }}"
                   id="{{ $id ?? $name }}"
                    {{ Arr::except($attributes, ['required', 'placeholder', 'label', 'class', 'name', 'id', 'value', 'help']) }}
            />
            <label class="form-check-label" for="{{ $id ?? $name }}">

            </label>
        </div>
    @error($name)
    <p class="form-error text-danger" role="alert">{{ $message }}</p>
    @enderror
</div>
