<div class="flex w-full sm:min-w-[400px] sm:w-auto flex-col gap-4 items-center">
    <h1 class="text-xl font-semibold">{{$title}}</h1>
    @csrf
    <x-input type="text" name="name" label="Name" placeholder="Specialty name"  value="{{$specialty->name ?? ''}}" required/>
    
    <x-input type="text" name="icon_url" label="Icon Url" placeholder="Specialty icon Url"  value="{{$specialty->icon_url ?? ''}}" required/>
        
    <x-text-area name="description" label="Description" placeholder="Specialty description" rows="4" cols="30" value="{{$specialty->description ?? ''}}"/>
    
    <x-button type="submit" name="submit" text="{{$title}}" class="w-full my-2 btn-secondarybtn" />
</div>
