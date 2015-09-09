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

                <?php
                 $match = 0;
                foreach( $ship->userFavorite()->lists('id') as $id)
                {
                    if($id == $user->id)
                    {
                        $match = 1;
                    }
                }
                ?>
                    {!! Form::open(['route' => 'ships.favorite']) !!}
                    @if($match == 1)
                        {!! Form::checkbox('favorite_ship_id', $ship->id, true, ['class' => 'form-control cb_hidden', 'onClick' => 'this.form.submit()']) !!}
                        {!! Form::label('favorite_ship_id', ' ', ['class' => 'favorite_ship', 'onClick' => 'this.form.submit()']) !!}
                        {!! Form::hidden('favorite_ship_id', $ship->id) !!}
                    @else
                        {!! Form::checkbox('favorite_ship_id', $ship->id, null, ['class' => 'form-control cb_hidden standard_ship', 'onClick' => 'this.form.submit()']) !!}
                        {!! Form::label('favorite_ship_id', ' ', ['class' => 'standard_ship', 'onClick' => 'this.form.submit()']) !!}
                        {!! Form::hidden('standard_ship_id', $ship->id) !!}
                    @endif

                    {!! Form::close() !!}


            </td>
        </tr>
    @endforeach
</table>
