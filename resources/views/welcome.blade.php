@extends('layouts.excms')

@section('conteudo')

    @include('sections.section-intro')

    <main id="main">

        @include('sections.section-about')
        @include('sections.section-history')
        @if($menspre != null)
        @include('sections.section-mensagem-pres')
        @include('sections.section-diret')
        @endif
        @if(count($expresids) > 0)
        @include('sections.section-expresid')
        @endif
        @include('sections.section-loja')
        @if(count($convenios) > 0)
        @include('sections.section-serv')
        @endif
        {{--
        @include('sections.section-news') --}}
        @if(count($galeries) > 0)
        @include('sections.section-galery')
        @endif
        {{--@include('sections.section-parce')--}}

    </main><!-- End #main -->

    <!-- Principal fim -->
@endsection

