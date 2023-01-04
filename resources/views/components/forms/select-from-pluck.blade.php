<div @class(['mb-3' => isset($label),]) >
    @if($label ?? null)
        <label class="{{ ($required ?? false) ? 'form-label form-label-required' : 'form-label' }}" for="{{ $id ?? $name }}">
            {{ $label }}
            @if($help ?? null)
                <a tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" title="Information" data-bs-content="{{ $help }}"><i class="fas fa-info-circle"></i></a>
            @endif
        </label>
    @endif
    <select name="{{ $name }}" id="{{ $id ?? $name }}" class="input form-control {{ $class ?? '' }}"{{ ($required ?? false) ? ' required' : '' }}{{ ($multiple ?? false) ? ' multiple' : '' }}>
        @if (!($required ?? false))
            <option value="">{{ $placeholder ?? 'Please select' }}</option>
        @endif
        @foreach($options as $id => $option)
            @if($multiple ?? false)
                <option value="{{ $id }}" @if(in_array($id, old($name, $value ?? [])))selected="true"@endif> {{ $option }}</option>
            @else
                <option value="{{ $id }}" @if($id == old($name, $value ?? ''))selected="true"@endif> {{ $option }}</option>
            @endif
        @endforeach
    </select>
    @error($name)
    <p class="form-error text-danger" role="alert">{{ $message }}</p>
    @enderror
</div>
