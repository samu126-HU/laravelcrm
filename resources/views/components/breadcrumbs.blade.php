<?php
$items = $items ?? [];

$normalizedItems = array_map(function($item) {
    if (is_array($item) && count($item) === 1) {
        $label = array_key_first($item);
        $url = $item[$label];
        return [
            'label' => $label,
            'url' => $url
        ];
    }
    return $item;
}, $items);
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="display: flex; list-style: none; padding: 0; margin: 0;">
        @foreach ($normalizedItems as $index => $item)
            <li style="display: flex; align-items: center;">
                @if (!empty($item['url']) && $index !== count($normalizedItems) - 1)
                    <a href="{{ $item['url'] }}" style="text-decoration: none; color: #007bff;">
                        {{ __($item['label']) }}
                    </a>
                @else
                    <span style="color: #6c757d;">{{ __($item['label']) }}</span>
                @endif
                @if ($index !== count($normalizedItems) - 1)
                    <span style="margin: 0 8px;">/</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>