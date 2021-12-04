<button {{ $attributes->merge([
    'class' => "
            text-xs bg-red-500 text-gray-100 border-2
            border-red-200 py-1 px-2 rounded-md text-center
            hover:bg-red-700"
  ]) }}>
  {{ $slot }}
</button>
