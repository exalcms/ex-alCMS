@extends('layouts.excms')

@section('conteudo')
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div id="admin-content">
        <div class="container-admin">
            <div class="row">
                <div class="col-md-12">
                    <div class="w-auto p-3">
                        <div class="panel-heading-admin">
                            <h5>Convênios de Parceiros da Associação dos Ex-Alunos do CMS</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row btn-new-reset">
                                {!! Button::primary('Novo')->asLinkTo(route('admin.convenios.create')) !!}
                                {!! Button::primary('Limpar')->asLinkTo(route('admin.convenios.index')) !!}
                            </div>
                            <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                {!!
                                    Table::withContents($convenios)->striped()
                                    ->callback('Detalhes', function ($field, $convenio){

                                        if(!$convenio->photo){
                                            $img = \App\Models\Photo::where('origin_name', '=', 'dir_sem_foto.jpg')->first();
                                            $foto = $img->name;
                                        }else{
                                            foreach($convenio->photos as $photo){
                                                $nome = $photo->origin_name;
                                                $marca = "marca";
                                                if (preg_match("/{$marca}/i", $nome)){
                                                    $foto = $photo->name;
                                                    //dd($foto);
                                                    break;
                                                }else{
                                                    $img = \App\Models\Photo::where('origin_name', '=', 'dir_sem_foto.jpg')->first();
                                                    $foto = $img->name;
                                                }
                                            }
                                        }
                                        return MediaObject::withContents([
                                            'image' => asset('uploads/'.$foto),
                                            'link' => '#',
                                            'heading' => $convenio->empresa,
                                            'body' => $convenio->beneficios,
                                            ])->addClass(['mo-galeria']);
                                    })
                                    ->callback('Actions', function ($field, $convenio){
                                        $linkEdit = route('admin.convenios.edit', ['convenio' => $convenio->id]);
                                        $linkShow = route('admin.convenios.show', ['convenio' => $convenio->id]);
                                        $linkFoto = route('admin.convenios.photorel', ['convenio' => $convenio->id]);
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
        {{ $convenios->links() }}
    </div>
</div>
@endsection
