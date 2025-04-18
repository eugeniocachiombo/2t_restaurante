<div>
    @foreach ($inputs as $key => $item)
        <input type="text" wire:key='{{ $key }}' wire:model="values.{{ $key }}"
            placeholder="Valor {{ $key }}"> <br>

        @error("values.$key")
            <span style="color: red">{{ $message }}</span>
        @enderror <br>
    @endforeach


    <button wire:click='add()'>
        Adicionar
    </button>

    <button wire:click='submit'>
        Submeter
    </button>
</div>
