@props(['status'])

@php
    $map = [
        1 => ['status-pill-success', __('status.paid')],
        2 => ['status-pill-danger', __('status.unpaid')],
        3 => ['status-pill-warning', __('status.partial')],
    ];
    [$class, $label] = $map[(int) $status] ?? ['status-pill-secondary', __('status.unknown')];
@endphp

<span class="badge rounded-pill {{ $class }} status-badge">{{ $label }}</span>
