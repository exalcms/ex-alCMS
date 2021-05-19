@extends('layouts.excms')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Lista de fotos</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Novas Fotos')->asLinkTo(route('admin.photoUpload')) !!}
                                {!! Button::primary('Limpar')->asLinkTo(route('admin.photos.index')) !!}
                            </div>
                            <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                {!!
                                    Table::withContents($photos->items())->striped()
                                    ->callback('Detalhes', function($field, $photo){
                                        return MediaObject::withContents([
                                            'image' => asset('storage/'.$photo->name),
                                            'link' => asset($photo->photo_path),
                                            'heading' => $photo->using,
                                            'body' => 'Nome do arquivo - '.$photo->origin_name,
                                            ]);
                                    })
                                    ->callback('Actions', function ($field, $photo){
                                        $linkDel = route('admin.photos.show', ['photo' => $photo->id]);
                                        $linkShow = route('admin.photos.show', ['photo' => $photo->id]);
                                        return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow)." | ".
                                        \Bootstrapper\Facades\Button::LINK('<i class="fas fa-trash-alt"></i>')->asLinkTo($linkDel);
                                    })
                                !!}
                            </div>
                        </div>
                        </div>
                    {{ $photos->links() }}
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
