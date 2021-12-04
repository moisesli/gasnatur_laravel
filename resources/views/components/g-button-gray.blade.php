<button {{ $attributes->merge([
    'class' => "
            text-xs bg-gray-500 text-gray-100 border-2
            border-gray-200 py-1 px-2 rounded-md text-center
            hover:bg-gray-700"
  ]) }}>
  {{ $slot }}
</button>
