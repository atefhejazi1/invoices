@props(['user'])

@php
    $width = $attributes->get('width');
    $height = $attributes->get('height');
    $sizeStyle = '';
    if ($width) {
        $sizeStyle .= 'width:' . (is_numeric($width) ? $width . 'px' : $width) . ';';
    }
    if ($height) {
        $sizeStyle .= 'height:' . (is_numeric($height) ? $height . 'px' : $height) . ';';
    }
@endphp

@if ($user->avatar)
    <img {{ $attributes->merge(['alt' => $user->name, 'src' => $user->avatar_url]) }}>
@else
    <div {{ $attributes->except(['width', 'height'])->merge([
            'style' => $sizeStyle . "background-color:{$user->avatar_color};color:#fff;display:flex;align-items:center;justify-content:center;border-radius:50%;font-weight:600;flex-shrink:0;",
        ]) }}>{{ $user->initials }}</div>
@endif
