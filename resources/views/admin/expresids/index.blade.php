@extends('layouts.excms')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Ex-Presidentes da Associação dos Ex-Alunos do CMS</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Novo')->asLinkTo(route('admin.expresids.create')) !!}
                                {!! Button::primary('Limpar')->asLinkTo(route('admin.expresids.index')) !!}
                            </div>
                            <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                {!!
                                    Table::withContents($expresids)->striped()
                                    ->callback('Detalhes', function ($field, $expresid){
                                        $image = new \App\Models\Image();
                                        $data = $expresid->images->all();
                                        dd($data);
                                        $image->fill($data);
                                        dd($image);
                                        if($expresid->foto_path == null){
                                            $img = \App\Models\Image::where('id', '=', 1)->first();
                                            $expresid->foto_path = $img->name;
                                        }
                                        return MediaObject::withContents([
                                            'image' => asset('storage/'.$expresid->images),
                                            'link' => '#',
                                            'heading' => $expresid->user->name_full,
                                            'body' => 'De '.$expresid->inicio.' até '.$expresid->final ,
                                            ]);
                                    })
                                    ->callback('Actions', function ($field, $expresid){
                                        $linkEdit = route('admin.expresids.edit', ['expresid' => $expresid->id]);
                                        $linkShow = route('admin.expresids.show', ['expresid' => $expresid->id]);
                                        return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-pencil-alt"></i>')->asLinkTo($linkEdit)." | ".
                                        \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow);
                                    })
                                !!}
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
        {{ $expresids->links() }}
    </div>
</div>
@endsection
