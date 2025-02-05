
<div {{$attributes->merge(['class' => "h-[200px] w-full flex items-center justify-center $class"])}}>
    <label for="input-file" id="drop-area" class="w-full h-full flex items-center justify-center flex-col">  
        <input type="file" accept="image/*" name="{{$name}}" id="input-file" hidden>
        <div class="border h-full flex flex-col gap-2 items-center justify-center w-full border-2-dashed border-border_clr bg-pending-bg rounded-sm bg-no-repeat bg-cover bg-center" id="img-view">
            <i class="fas fa-cloud-upload text-accent text-3xl font-semibold"></i>
            <p class="text-center text-sm text-secondary">Drop or click here <br/> to upload image</p>
        </div>
        @error($name)
        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </label>
</div>