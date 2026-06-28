@props(['status'])

@php
    $map = [
        1 => ['status-pill-success', 'مدفوعة'],
        2 => ['status-pill-danger', 'غير مدفوعة'],
        3 => ['status-pill-warning', 'مدفوعة جزئياً'],
    ];
    [$class, $label] = $map[(int) $status] ?? ['status-pill-secondary', 'غير محدد'];
@endphp

<span class="badge rounded-pill {{ $class }} status-badge">{{ $label }}</span>
