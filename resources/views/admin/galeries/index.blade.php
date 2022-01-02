@extends('layouts.excms')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Lista de Galerias</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Nova')->asLinkTo(route('admin.galeries.create')) !!}
                                {!! Button::primary('Limpar')->asLinkTo(route('admin.galeries.index')) !!}
                            </div>
                            <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                {!!
                                    Table::withContents($galeries)->striped()
                                    ->callback('Detalhes', function ($field, $galery){
                                        $photCount = count($galery->photos);
                                        if($photCount == 0){
                                            $img = \App\Models\Photo::where('origin_name', '=', 'dir_sem_foto.jpg')->first();
                                            $foto = $img->name;
                                        }else{
                                            foreach($galery->photos as $photo){
                                                $foto = $photo->name;
                                                break;
                                            }
                                        }
                                        return MediaObject::withContents([
                                            'image' => asset('uploads/'.$foto),
                                            'link' => '#',
                                            'heading' => $galery->titulo,
                                            'body' => $galery->descricao.'<br/><i class="fas fa-photo"></i> Total de fotos: '.$photCount,
                                            ])->addClass(['mo-galeria']);
                                    })
                                    ->callback('Actions', function ($field, $galery){
                                        $linkEdit = route('admin.galeries.edit', ['galery' => $galery->id]);
                                        $linkShow = route('admin.galeries.show', ['galery' => $galery->id]);
                                        $linkFoto = route('admin.galeries.photorel', ['galery' => $galery->id]);
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
        {{ $galeries->links() }}
    </div>
</div>
@endsection
