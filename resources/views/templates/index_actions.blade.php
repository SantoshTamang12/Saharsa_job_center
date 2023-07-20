@if (!isset($hideShow))
    @if(isset($modalShow))
        <button type="button"
                class="btn btn-sm btn-success btn-icon btn-hover-primary order-modal" data-id="{{$id ?: $item->id}}" data-toggle="modal"
                data-target=".bd-example-modal-lg"><i
                class="fa fa-eye"></i></button>
    @elseif(isset($isRBTS))
        <a href="{{route($route.'show',["donation"=> $id??$item->id, 'filter' => $isRBTS])}}"
           class="btn btn-sm btn-success btn-icon btn-hover-primary mt-2"><i
                class="fa fa-eye"></i></a>
    @elseif(isset($invoiceShow))
        <a href="{{route($route.'create',["invoice"=> $id??$item->id])}}"
           class="btn btn-sm btn-success btn-icon btn-hover-primary mt-2"><i
                class="fa fa-eye"></i></a>
    @else
        <a href="{{route($route.'show',$id??$item->id)}}"
           class="btn btn-sm btn-success btn-icon btn-hover-primary mt-2"><i
                class="fa fa-eye"></i></a>
    @endif
@endif
@if (!isset($hideEdit))
    @if(isset($isRBTS) )
        <a href="{{route($route.'edit',["donation"=> $id??$item->id, 'filter' => $isRBTS])}}"
           class="btn btn-sm btn-primary btn-icon btn-hover-info mt-2"><i
                class="fa fa-pencil-alt"></i></a>
    @elseif(isset($modalEdit))
        <button type="button"
                class="btn btn-sm btn-primary btn-icon btn-hover-primary" data-id="{{$id ?: $item->id}}" data-toggle="modal"
                data-target="#editModal"><i
                class="fa fa-pencil-alt"></i></button>
    @elseif(isset($invoiceEdit) )
        <a href="{{route($route.'create',["invoice"=> $id??$item->id])}}"
           class="btn btn-sm btn-primary btn-icon btn-hover-info mt-2"><i
                class="fa fa-pencil-alt"></i></a>
    @else
    <a href="{{route($route.'edit',$id??$item->id)}}"
       class="btn btn-sm btn-primary btn-icon btn-hover-info mt-2 btnEdit"><i
            class="fa fa-pencil-alt"></i></a>
    @endif
@endif

@if (isset($showReceipt))
    <a href="{{route('receipt.index',$id??$item->id)}}" target="_blank"
       class="btn btn-sm btn-clean btn-icon btn-hover-info"><i
            class="fa fa-receipt"></i></a>
@endif


@if (!isset($hideAlertDelete))
    @if (isset($isRBTS))
        <form id="delete-form" class="d-inline" action="{{ route($route.'destroy',["donation"=> $id??$item->id, 'filter' => $isRBTS]) }}"
              method="POST" onclick="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <input type="hidden" name="revert" value="no">
            <button class="btn btn-sm btn-danger btn-icon btn-hover-danger mt-2"><i
                    class="fa fa-trash fa-sm"></i></button>
        </form>
        @else
        <form id="delete-form" class="d-inline" action="{{ route($route.'destroy',$id??$item->id) }}"
              method="POST" onclick="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <input type="hidden" name="revert" value="no">
            <button class="btn btn-sm btn-danger btn-icon btn-hover-danger mt-2"><i
                    class="fa fa-trash fa-sm"></i></button>
        </form>
@endif

@else
    <form id="delete-form" class="d-inline" action="{{ route($route.'destroy',$id??$item->id) }}"
          method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="revert" value="no">
        <button class="btn btn-sm btn-clean btn-icon btn-hover-danger delete-btn"><i
                class="fa fa-trash fa-sm"></i></button>
    </form>
@endif
@if (isset($showOrder))
    <a href="#" type="button" class="btn btn-sm btn-outline-primary sort-handle mt-2" data-mdb-color="primary" title="Sort"><i class="fas fa-arrows-alt"></i></a>
@endif
@foreach($actions??[] as $action)
    {!! $action !!}
@endforeach
