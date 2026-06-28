@props(['status'])

@php
    $map = [
        1 => ['bg-success', 'مدفوعة'],
        2 => ['bg-danger', 'غير مدفوعة'],
        3 => ['bg-warning text-dark', 'مدفوعة جزئياً'],
    ];
    [$class, $label] = $map[(int) $status] ?? ['bg-secondary', 'غير محدد'];
@endphp

<span class="badge rounded-pill {{ $class }} status-badge">{{ $label }}</span>
