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
            
            @if ($extraColumn)
                <th class="border border-gray-300 px-4 py-2">
                    {{ $extraColumn }}
                </th>
            @endif
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
                
                @if ($actionColumn)
                    <td class="border border-gray-300 px-4 py-2">
                        @if (View::exists('simple-table::action-column'))
                            @include('simple-table::action-column', ['row' => $row])
                        @else
                            -
                        @endif
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $data->links() }}
</div>
