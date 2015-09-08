<table class="ship_index">
    @foreach ($shiplist as $ship)
        <tr class="ship_index__row">
            <td>
                <a href = "{{ route('ships.show', $ship->id) }}">
                    <span class="list__el__el list__el__span--strippen">{{ $ship->strippen_total }}</span>
                    <span class="list__el__el">{{ $ship->name }}</span>

                </a>
            </td>
            <td class="ship_favorite">
                @foreach( $ship->userFavorite()->lists('id') as $id)
                    @if($id == $user->id)
                        <img src="{{ url('img/star.svg') }}"/>
                    @endif
                @endforeach

            </td>
        </tr>
    @endforeach
</table>
