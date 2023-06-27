<div class="d-inline-block">
    {{-- Because she competes with no one, no one can compete with her. --}}
    <a href="#" wire:click="$emitTo('{{$target}}', '{{$eventName}}')" class="btn btn-success"><i class="fas fa-file-excel mr-2"></i>{{ $text ?? 'Export' }}</a>
</div>
