<button {{ $attributes->merge([
    'class' => "
            text-xs bg-purple-500 text-gray-100 border-2
            border-purple-200 py-1 px-2 rounded-md text-center
            hover:bg-purple-700"
  ]) }}>
  {{ $slot }}
</button>
