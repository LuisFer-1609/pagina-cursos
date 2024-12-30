@props(['text', 'type', 'name', 'id'])

<label class="relative flex flex-col py-4" for="" id="{{ $id }}">
    <input
        class="relative z-[1] peer/nombre border-0 outline outline-1 outline-gray-700 text-[15px] bg-transparent rounded-lg py-4 ps-[20px]"
        type="{{ $type }}" placeholder=" " name="{{ $name }}" />
    <span
        class="absolute top-[28px] text-xs translate-y-[-50%] left-5 text-gray-700 transition-all duration-500 peer-placeholder-shown/nombre:top-[50%] peer-placeholder-shown/nombre:text-gray-400 peer-placeholder-shown/nombre:text-base">{{ $text }}</span>
</label>
