@extends('layouts.admin')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Lista de Cargos da Diretoria</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Novo')->asLinkTo(route('admin.compos.create')) !!}
                                {!! Button::primary('Limpar')->asLinkTo(route('admin.compos.index')) !!}
                            </div>
                            <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                {!!
                                    Table::withContents($compos)->striped()
                                    ->callback('Detalhes', function ($field, $compo){

                                        if(!$compo->foto){
                                            $img = \App\Models\Photo::where('origin_name', '=', 'dir_sem_foto.jpg')->first();
                                            $foto = $img->photo_path;
                                        }else{
                                            $img = \App\Models\Photo::where('id', '=', $compo->photo_id)->first();
                                            $foto = $img->photo_path;
                                        }
                                        return MediaObject::withContents([
                                            'image' => asset($foto),
                                            'link' => '#',
                                            'heading' => $compo->user->name_full,
                                            'body' => $compo->diretoria->cargo,
                                            ])->addClass(['mo-galeria']);
                                    })
                                    ->callback('Actions', function ($field, $compo){
                                        $linkEdit = route('admin.compos.edit', ['compo' => $compo->id]);
                                        $linkFoto = route('admin.compos.photorel', ['compo' => $compo->id]);
                                        return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-pencil-alt"></i>')->asLinkTo($linkEdit)." | ".
                                        \Bootstrapper\Facades\Button::LINK('<i class="fas fa-photo"></i>')->asLinkTo($linkFoto);
                                    })
                                !!}
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
