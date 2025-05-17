<div class="position-relative ">
    <input type="file" id="photoUploadInput" wire:model="photo" class="d-none" accept="image/*">
    <button type="button" class="btn btn-link p-0 m-0" onclick="document.getElementById('photoUploadInput').click();">
        <i wire:loading.remove wire:target="photo" class="fa fa-camera orange_color" style="font-size: 30px;"></i>
    </button>

    <div wire:loading wire:target="photo" class="text-muted small">
        <i class="fa fa-spinner fa-spin fa-3x orange_color" ></i> 
    </div>

    @error('photo') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
