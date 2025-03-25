<table class="table-auto w-full border-collapse border border-gray-300">
    <thead>
        <tr>
            @foreach ($columns as $column)
                <th class="border border-gray-300 px-4 py-2">
                    <a href="?sort={{ $column }}&order={{ request('order', 'asc') == 'asc' ? 'desc' : 'asc' }}">
                        {{ ucfirst($column) }}
                    </a>
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                @foreach ($columns as $column)
                    <td class="border border-gray-300 px-4 py-2">
                        {{ $row->$column }}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $data->links() }}
</div>
