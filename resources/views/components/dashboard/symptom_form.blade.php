<div class="flex w-full sm:min-w-[400px] sm:w-auto flex-col gap-4 items-center">
    <h1 class="text-xl font-semibold">{{$title}}</h1>
    @csrf
    <x-input type="text" name="name" label="Name" placeholder="Symptom name"  value="{{$symptom->name ?? ''}}" required/>
        
    <x-text-area name="icon_url" label="Icon Url(svg element)" placeholder="Symptom icon Url" rows="4" cols="30" value="{{$symptom->icon_url ?? ''}}"/>

    <div class="w-full flex flex-col">
        <label for="specialty">Specialty</label>
        <select class="border-2 border-border_clr outline-none p-2 focus:border-accent transition-all ease-in-out duration-600" name="specialty_id" id="specialty">
            @foreach ($specialties as $specialty)
                <option value="{{$specialty->id}}">{{$specialty->name}}</option>
            @endforeach
        </select>
    </div>

    <x-button type="submit" name="submit" text="{{$title}}" class="w-full my-2 btn-secondarybtn" />
</div>
