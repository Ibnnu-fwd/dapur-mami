<table class="w-full">
    @foreach ($menus as $data)
        <tr>
            <td>{{ $data->menu->name }}</td>
            <td class="text-end">{{ $data->quantity }}x</td>
        </tr>
    @endforeach
</table>
