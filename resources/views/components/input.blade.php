<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input 
    type="{{ $type }}" 
    id="{{ $name }}" 
    value="{{ old($name,$default) }}" 
    name="{{ $multiple ? $name."[]" : $name  }}"
    @isset($form)
    form="{{ $form }}" 
    @endisset
    class="form-control @error($name) is-invalid @enderror @error("$name.*") is-invalid @enderror"
    @isset($multiple) multiple @endisset
    >

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    @isset($multiple)
        @error("$name.*")
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    @endisset
</div>