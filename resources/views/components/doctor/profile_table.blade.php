<table class="w-full">
    <tbody>
        <tr>
            <td class="font-medium text-secondary min-w-[100px]">
                Specialty
            </td>
            <td class="text-sm text-slate-400">
                {{$doctor->specialty->name}}
            </td>
        </tr>
        <tr>
            <td class="font-medium text-secondary min-w-[100px]">
                Gender
            </td>
            <td class="text-sm text-slate-400">
                {{$doctor->user->gender}}
            </td>
        </tr>
        <tr>
            <td class="font-medium text-secondary min-w-[100px]">
                Age
            </td>
            <td class="text-sm text-slate-400">
                {{$age}} yrs old
            </td>
        </tr>
        <tr>
            <td class="font-medium text-secondary min-w-[100px]">
                Works at
            </td>
            <td class="text-sm text-slate-400">
                {{$doctor->hospital}}
            </td>
        </tr>
        <tr>
            <td class="font-medium text-secondary min-w-[100px]">
                Address
            </td>
            <td class="text-sm text-slate-400">
                {{$doctor->user->city}}, {{$doctor->user->Nationality}}
            </td>
        </tr>
        <tr>
            <td class="font-medium text-secondary min-w-[100px]">
                Contact Via
            </td>
            <td class="text-sm text-slate-400">
                <div class="flexible">
                    @foreach($contacts as $contact)
                        @php
                            $value = $contact->pivot->value;
                            $href = $contact->name == 'email' ? 'mailto:'.$value : ( $contact->name == 'whatsapp' ? "https://wa.me/237$value?text=I%20saw%20you%20as%20a%20doctor%20on%20Drogcine%20and%20will%20like%20to%20know%20more%20about%20you" : $value);
                        @endphp
                        <a href="{{$href}}" class="default_transition text-accent hover:text-white hover:bg-accent size-[30px] rounded-full border inline-flex items-center justify-center" title="{{$contact->name}} Link" target="_blank">
                            {!! $contact->icon_url!!}
                        </a>
                    @endforeach
                </div>
            </td>
        </tr>
    </tbody>
</table>
