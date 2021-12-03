@props(['value','color'])

<button {{ $attributes->merge([
    'class' => "
            text-xs bg-$color-500 text-gray-100 border-2
            border-$color-200 py-1 px-2 rounded-md text-center
            hover:bg-$color-700"
  ]) }}>
  {{ $slot }}
</button>
