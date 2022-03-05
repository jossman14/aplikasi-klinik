<a type="button" class="btn waves-effect waves-light green btn-sm btn-icon btn-pure btn-outline see"
    href="javascript:void(0)" data-toggle="tooltip"
    data-original-title="show""><i
                                                    class=" ti-search" aria-hidden="true"></i></a>

<a type="button" class="btn waves-effect waves-light orange btn-sm btn-icon btn-pure btn-outline edit"
    href="javascript:void(0)" data-toggle="tooltip"
    data-original-title="edit"><i class="ti-pencil" aria-hidden="true"></i></a>



<form method="POST" action="javascript:void(0)"
    style="display: inline" class="delete">
    @csrf
    @method('DELETE')
    <input name="_method" type="hidden" value="DELETE">
    <a type="button" class="btn waves-effect waves-light red btn-sm btn-icon btn-pure btn-outline show_confirm"
        data-toggle="tooltip" data-original-title="delete" title='Delete'><i class="ti-close"
            aria-hidden="true"></i></a>

    {{-- <button type="submit"
                                                    class="btn waves-effect waves-light red btn-sm btn-icon btn-pure btn-outline show_confirm"
                                                    data-toggle="tooltip" title='Delete'>Delete</button> --}}
</form>

