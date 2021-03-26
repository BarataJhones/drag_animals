@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-yellow-50 focus:ring focus:ring-yellow-600 focus:ring-opacity-30']) !!}>
