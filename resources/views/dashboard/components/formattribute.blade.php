@if (!empty($modifiedClients) && count($modifiedClients) > 0)
    @foreach($modifiedClients[0]->getAttributes() as $fieldName => $fieldValue)
        @if (!in_array($fieldName, ['created_at', 'updated_at']))
            @php
                $formattedFieldName = str_replace('_', ' ', ucfirst($fieldName));
            @endphp
            <th>{{ $formattedFieldName }}</th>
        @endif
    @endforeach
@endif
