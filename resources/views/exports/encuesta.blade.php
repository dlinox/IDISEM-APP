<table class="table">
    <thead style="background-color: red;">
        <tr>
            @foreach($header as $item)
            <th scope="col">
                {{ $item }}
            </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            @foreach($item as $ele)
            <td>
                {{ $ele }}
            </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>