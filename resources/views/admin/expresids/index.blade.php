@extends('layouts.admin')

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

                                        if(!$expresid->foto){
                                            $img = \App\Models\Photo::where('origin_name', '=', 'dir_sem_foto.jpg')->first();
                                            $foto = $img->photo_path;
                                        }else{
                                            $img = \App\Models\Photo::where('id', '=', $expresid->photo_id)->first();
                                            //dd($img);
                                            $foto = $img->photo_path;
                                        }
                                        return MediaObject::withContents([
                                            'image' => asset($foto),
                                            'link' => '#',
                                            'heading' => $expresid->user->name_full,
                                            'body' => 'De '.$expresid->inicio.' até '.$expresid->final ,
                                            ])->addClass(['mo-galeria']);
                                    })
                                    ->callback('Actions', function ($field, $expresid){
                                        $linkEdit = route('admin.expresids.edit', ['expresid' => $expresid->id]);
                                        $linkShow = route('admin.expresids.show', ['expresid' => $expresid->id]);
                                        $linkFoto = route('admin.expresids.photorel', ['expresid' => $expresid->id]);
                                        return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-pencil-alt"></i>')->asLinkTo($linkEdit)." | ".
                                        \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow)." | ".
                                        \Bootstrapper\Facades\Button::LINK('<i class="fas fa-photo"></i>')->asLinkTo($linkFoto);
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
