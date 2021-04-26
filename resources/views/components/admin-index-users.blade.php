<div class="p-6 sm:px-20 bg-white border-b border-gray-200">

    <div class="mt-8 text-2xl">
        Lista de Usuários
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="panel-heading">
        <h5 class="col-lg-3">Users List</h5>
        <div class="row col-lg-offset-6">
            <form action="{{ route('admin.users.index') }}" method="get">
                <div class="col-lg-3" style="text-align: right">
                    <label class="control-label">Search</label>
                </div>
                <div class="col-lg-5">
                    <input type="search" class="form-control input-sm" name="search" >
                </div>
                <div class="col-lg-4">
                    <button type="submit" class="btn btn-primary btn-sm" title="Pesquisar">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="panel-body">
        <div class="row" style="margin-left: 10px; margin-bottom: 5px;">
            {!! Button::primary('New')->asLinkTo(route('admin.users.create')) !!}
            {!! Button::primary('Reset')->asLinkTo(route('admin.users.index')) !!}
        </div>
        <div class="row" style="margin-left: 10px; margin-right: 10px;">
            {!!
                Table::withContents($users->items())->striped()
                ->callback('Actions', function ($field, $user){
                    $linkEdit = route('admin.users.edit', ['user' => $user->id]);
                    $linkShow = route('admin.users.show', ['user' => $user->id]);
                    return Button::link(Icon::create('pencil'))->asLinkTo($linkEdit)." | ".
                    Button::link(Icon::create('eye-open'))->asLinkTo($linkShow);
                })
            !!}
        </div>
        {!! $users->links() !!}
    </div>

</div>
