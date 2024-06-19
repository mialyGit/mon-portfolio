@props([
    'type' => 'text',
    'label' => 'Input',
    'placeholder' => '',
    'model' => 'input',
    'value' => '',
])

@php
    $errorClass = $errors->has($model) ? 'is-invalid' : '';
    $requiredAttribute = $attributes->get('required') ? 'required' : '';
@endphp

<label class="{{ $requiredAttribute }}">@lang($label)</label>

<input {!! $attributes->merge([
    'class' => 'form-control ' . $errorClass,
    'type' => $type,
    'name' => $model,
    'id' => $model,
    'placeholder' => trans($placeholder),
    'value' => old($model, $value),
]) !!}>

@error($model)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
