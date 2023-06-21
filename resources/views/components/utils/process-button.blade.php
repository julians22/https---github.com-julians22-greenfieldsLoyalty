@props(['href' => '#', 'permission' => false])

<x-utils.link :href="$href" class="btn btn-success btn-sm" icon="fas fa-microchip" :text="__('Process')" permission="{{ $permission }}" />
