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
                Experience
            </td>
            <td class="text-sm text-slate-400">
                {{$doctor->experience}} Years
            </td>
        </tr>
        <tr>
            <td class="font-medium text-secondary min-w-[100px]">
                Consultation Fee
            </td>
            <td class="text-sm text-slate-400">
                {{(int)$doctor->consultation_fee}} CFA
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
    </tbody>
</table>
