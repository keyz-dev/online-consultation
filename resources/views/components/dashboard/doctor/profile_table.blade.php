<table class="w-full">
    <tbody>
        <tr>
            <td class="font-medium text-secondary min-w-[50px] md:min-w-[100px]">
                Gender
            </td>
            <td class="text-sm text-slate-400">
                {{$doctor->user->gender}}
            </td>
        </tr>
        <tr>
            <td class="font-medium text-secondary min-w-[50px] md:min-w-[100px]">
                Age
            </td>
            <td class="text-sm text-slate-400">
                {{$age}} yrs old
            </td>
        </tr>
        <tr>
            <td class="font-medium text-secondary min-w-[50px] md:min-w-[100px]">
                Address
            </td>
            <td class="text-sm text-slate-400">
                {{$doctor->user->city}}, {{$doctor->user->Nationality}}
            </td>
        </tr>
        {{-- Display the contact information --}}
        @foreach($contacts as $contact)
            <tr>
                <td class="font-medium text-secondary min-w-[50px] md:min-w-[100px]">
                    {{$contact->name}}
                </td>
                <td class="text-sm text-slate-400 text-wrap">
                    {{$contact->pivot->value}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

