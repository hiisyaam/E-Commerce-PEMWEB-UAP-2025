@props(['disabled' => false])

<input @disabled($disabled) 
    {{ $attributes->merge(['class' => 'border-gray-300 focus:border-[#8bae8e] focus:ring-[#8bae8e] rounded-md shadow-sm ']) }}>