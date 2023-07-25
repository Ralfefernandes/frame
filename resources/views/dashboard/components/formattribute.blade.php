@if (!empty($modifiedClients) && count($modifiedClients) > 0)
    @foreach($modifiedClients[0]->getAttributes() as $fieldName => $fieldValue)
        @if (!in_array($fieldName, ['created_at', 'updated_at', 'id', 'url']))
            @php
                $formattedFieldName = ucwords(str_replace('_', ' ', $fieldName));
            @endphp
            <th class="align-baseline " style="">{{ $formattedFieldName }}</th>

        @endif
    @endforeach
    <th>Actions</th>

@endif
