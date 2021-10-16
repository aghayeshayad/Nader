@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!} style="width: 100%">
    {{ $slot }}
</select>
